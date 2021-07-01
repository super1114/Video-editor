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
    public function __construct()
    {
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
        return redirect(route('project', ["hash"=>$hash_key]));
    }

    public function project($hash) {
        $user_id = Auth::user()->id;
        $project = Project::where("hashkey", "=", $hash)->first();
        $resources = Resource::where("project_id", "=", $hash)->get();
        $projects = Project::where("user_id", "=", $user_id)->orderBy("updated_at", "desc")->get();
        $items = Item::where("project_id", "=", $project->id)->orderBy("updated_at", "asc")->get();
        $components = array();
        foreach($items as $item) {
            $component = view("component", ["resource" => $item->resource])->render();
            array_push($components, $component);
        }
        //dd($components);
        $exported_videos = Project::where("user_id", "=", $user_id)->where("export_video", "!=", "")->get();
        return view("home", [
            "project_name" => $project->name, 
            "project_hash" => $hash, 
            "projects" => $projects, 
            "resources" => $resources,
            "exported_videos" => $exported_videos,
            "items" => $components
        ]);
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
