<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Resource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Mail;

class ProjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public $range;

    public function __construct() {
        $obj = (object) array(
            'minprice' => 0,
            'maxprice' => 10000,
            'min' => 0,
            'max' => 10000,
            'minthumb' => 0,
            'maxthumb' => 0,
        );
        $obj->mintrigger = function() {
            $this->minprice = min($this->minprice, $this->maxprice);      
            $this->minthumb = (($this->minprice - $this->min) / ($this->max - $this->min)) * 100;
        };
        $obj->maxtrigger = function() {
            $this->maxprice = min($this->maxprice, $this->minprice);      
            $this->maxthumb = 100 -(($this->minprice - $this->min) / ($this->max - $this->min)) * 100;
        };
        $this->range = $obj;
        $this->middleware('auth');
    }
    
    public function create(Request $request, $project_name)
    {
        $hash_key = substr(Crypt::encryptString($project_name),5,10);
        $project = new Project;
        $project->name = $project_name;
        $project->hashkey = $hash_key;
        $project->status = 1;
        $project->order_status = 1;
        $project->user_id = Auth::user()->id;
        $project->export_video = "";
        $project->save();
        dd("ssss");
        return redirect(route('project', ["hash"=>$hash_key]));
    }

    public function getItems ($project_id) {
        $items = Item::where("project_id", "=", $project_id)->orderBy("updated_at", "asc")->get();
        $duration_array = array();
        foreach($items as $item) {
            array_push($duration_array, $item->resource->duration);
        }
        $max_dur = count($duration_array)>0 ? max($duration_array) : 0;
        return array("items"=>$items, "max_dur"=>$max_dur);
    }

    public function project($hash) {
        $user_id = Auth::user()->id;
        $user = Auth::user();
        $project = Project::where("hashkey", "=", $hash)->first();
        $resources = Resource::where("project_id", "=", $hash)->get();
        $projects = Project::where("user_id", "=", $user_id)->orderBy("updated_at", "desc")->get();
        //$items = Item::where("project_id", "=", $project->id)->orderBy("updated_at", "asc")->get();
        $array = $this->getItems($project->id);
        $items = $array["items"];
        $max_dur = $array["max_dur"];
        $exported_videos = Project::where("user_id", "=", $user_id)->where("export_video", "!=", "")->get();
        $project_name = $project->name;
        $project_id = $project->id;
        $project_hash = $hash;
        return view("home", compact("project_name", "project_id", "project_hash", "projects", "resources" , "exported_videos", "items", "user", "max_dur"));
    }

    public function new_project_page(Request $request) {
        return view("create_project");
    }

    public function export_video($hash) {
        $project = Project::where("hashkey", "=", $hash)->first();
        $project->qrcode = $this->generateQRCode($project->hashkey);
        $project->export_video = "sssfffddd";
        $project->save();
    }

    public function generateQRCode($hashkey) {
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $dir = "uploads/qrcodes/";
        if (! is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $source = env("APP_URL")."/uploads/qrcodes/".$hashkey.".png";
        
        $qrcodeObj = $barcode->getBarcodeObj('QRCODE,H', $source, - 16, - 16, 'black', array(
            - 2,
            - 2,
            - 2,
            - 2
        ))->setBackgroundColor('#f5f5f5');
        $imageData = $qrcodeObj->getPngData();
        file_put_contents($dir . $hashkey . '.png', $imageData);
        return $source;
    }
    public function order_video(Request $request) {
        $id = $request->id;
        $project = Project::find($id);
        $user = Auth::user();
        $project->order_status = 2;
        //$project->qrcode = $this->generateQRCode($project->hashkey);
        $project->save();
        \Mail::to("super1114dev@gmail.com")->send(new \App\Mail\SendOrderMail($user));

    }

}
