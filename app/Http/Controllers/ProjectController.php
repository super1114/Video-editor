<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Resource;
use App\Models\Item;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Mail;
use FFMpeg;

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
        $xxx = $project->save();
        return redirect(route('project', ["hash"=>$hash_key]));
    }

    public function getItems ($project_id) {
        $items = Item::with('slots')->where("project_id", "=", $project_id)->orderBy("updated_at", "asc")->get();
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
        
        $project_name = $project->name;
        $project_id = $project->id;
        $project_hash = $hash;
        return view("home", compact("project_name", "project_id", "project_hash", "projects", "resources" , "items", "user", "max_dur"));
    }

    public function new_project_page(Request $request) {
        return view("create_project");
    }

    public function export_video(Request $request, $hash) {
        //$items = $request->items;
        $project_id = $request->project_id;
        $ffmpeg = FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => env('FFMPEG_PATH'),
            'ffprobe.binaries' => env('FFPROBE_PATH')
        ]);
        //dd($project_id);
        /*$video = $ffmpeg->open(public_path()."/".$items[0]["resource"]["path"]);
        $clip = $video->clip(FFMpeg\Coordinate\TimeCode::fromSeconds(1), FFMpeg\Coordinate\TimeCode::fromSeconds(5));
        $format = new FFMpeg\Format\Video\X264('aac', 'libx264');
        $clip->save($format, public_path()."/"."video.avi");
        foreach($items as $item) {
            dd("ffmpeg -i ".public_path()."/".$item["resource"]["path"]." -ss 00:00:00 -codec copy -t ".($item["i_end"]-$item["i_start"])." ".public_path()."/uploads/temp/".$item["id"].".mp4");
            //exec("ffmpeg -i ".public_path()."/".$item["resource"]["path"]." -ss 00:00:00 -codec copy -t ".($item["i_end"]-$item["i_start"])." ".public_path()."/uploads/temp/".$item["id"].".mp4");
        }
        exec("ffmpeg -i ".public_path()."/video/".$timestamp.$filename." ".public_path()."/video/new_".$timestamp.$filename);
        */

        //$video->concat(array($v1,$v2,$v3))->saveFromSameCodecs($newFile, TRUE);



        /*foreach($items as $item) {
            $video = $ffmpeg->open($item["resource"]["path"]);

        }
        $video = $ffmpeg->open($record->path);
        $video->
        */
        $project = Project::find($project_id);
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
        $id = $request->project_id;
        $project = Project::find($id);
        $user = Auth::user();
        $project->order_status = 2;
        //$project->qrcode = $this->generateQRCode($project->hashkey);
        $project->save();
        //\Mail::to("super1114dev@gmail.com")->send(new \App\Mail\SendOrderMail($user));

    }

    public function add_item(Request $request) {
        $project_id = $request->project_id;
        $org_items = $request->items;
        $new_item = $request->new_item;
        $record = new Item;
        $record->project_id = $project_id;
        $record->resource_id = $new_item["id"];
        $record->i_start = 0;
        $record->i_end = $new_item["duration"];
        if($org_items!=null){
            foreach($org_items as $oItem) {
                Item::where("project_id", "=", $oItem["project_id"])
                    ->where("resource_id", "=", $oItem["resource_id"])
                    ->update(array('i_start' => $oItem["i_start"], 'i_end' => $oItem["i_end"]));
            }
        }
        $record->save();
        $slot = new Slot;
        $slot->item_id = $record->id;
        $slot->v_start = 0;
        $slot->t_start = 0;
        $slot->duration = $new_item["duration"];
        $slot->save();
        $res_items = $this->getItems($project_id);
        $addItemHtml = view("time_slot", ["item"=>$record, "is_parent"=>true])->render();
        return response()->json(["items"=>$res_items["items"], "max_dur" => $res_items["max_dur"], "addItemHtml" => $addItemHtml ]);
    }
    public function del_item(Request $request) {
        $project_id = $request->project_id;
        $item_id = $request->item_id;
        $slot_id = $request->slot_id;
        Slot::find($slot_id)->delete();
        $item = Item::find($item_id);
    
        $itemHtml = "";
        if(count($item->slots)==0){
            $item->delete();
        } else {
            $itemHtml = view("time_slot", ["item"=>$item, "is_parent"=>true])->render();
        }
        $res_items = $this->getItems($project_id);
        return response()->json(["status"=>"success", "msg" => "OK", "items"=>$res_items["items"], "max_dur" => $res_items["max_dur"], "itemHtml"=>$itemHtml]);
    }

    public function cut_item(Request $request) {
        $slot_id = $request->slot_id;
        $item_id = $request->item_id;
        $item = Item::find($item_id);
        $curPosTime = $request->cutPosTime;
        $targetSlot = "";
        $slot = Slot::find($slot_id);
        //dd($slot->t_start,$curPosTime, $slot->t_start+$slot->duration);
        if($slot->t_start<$curPosTime&&($slot->t_start+$slot->duration)>$curPosTime){
            $record1 = new Slot;
            $record1->item_id = $item_id;
            $record1->v_start = $slot->v_start;
            $record1->t_start = $slot->t_start;
            $record1->duration = $curPosTime-$slot->t_start;
            $record1->save();

            $record2 = new Slot;
            $record2->item_id = $item_id;
            $record2->v_start = $slot->v_start+$record1->duration;
            $record2->t_start = $curPosTime;
            $record2->duration = $slot->duration-$record1->duration;
            $record2->save();
            $slot->delete();
            $itemHtml = view("time_slot", ["item"=>Item::find($item_id)
        , "is_parent"=>false])->render();
            $res_items = $this->getItems($item->project_id);
        
            return response()->json(["status"=>"success", "msg"=> "OK", "itemHtml"=>$itemHtml, "items"=>$res_items["items"],"max_dur" => $res_items["max_dur"]]);
            
        } else {
            return response()->json(["status"=>"failed", "msg"=>"time position is not correct"]);
        }
    }
    public function save_item(Request $request) {
        foreach($request->items as $item) {
            $record = Item::find($item["id"]);
            $record->i_start = $item["i_start"];
            $record->i_end = $item["i_end"];
            $record->save();
        }
        return response()->json(["status"=>"success"]);
    }

    public function my_projects(Request $reqeust) {
        $user_id = Auth::user()->id;
        $exported_videos = Project::where("user_id", "=", $user_id)->where("export_video", "!=", "")->get();
        return view("my_projects", compact("exported_videos"));
    }
}
