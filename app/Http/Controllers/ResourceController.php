<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Resource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use FFMpeg;
class ResourceController extends Controller
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
    }
    public function index(Request $request)
    {

    }

    
    public function upload(Request $request)
    {
        $resource = $request->file("resource");
        $mimeType = $resource->getMimeType();
        $project_hash = $request->project_hash;
        $file_name = $resource->getClientOriginalName();
        if(!file_exists("uploads/".$project_hash)){
            mkdir("uploads/".$project_hash, 0777);
        }

        $resource->move("uploads/".$project_hash, $file_name);
        $record = new Resource;
        $record->name = $file_name;
        $record->path = "uploads/".$project_hash."/".$file_name;
        $record->project_id = $project_hash;
        if(strpos($mimeType, "image")!==false) {
            $record->type = "image";
            $record->thumbnail = "uploads/".$project_hash."/".$file_name;
            $record->duration = 0;
        } else if (strpos($mimeType, "video")!==false) {
            $record->type = "video";
            $ffmpeg = FFMpeg\FFMpeg::create([
                'ffmpeg.binaries'  => env('FFMPEG_BINARIES'),
                'ffprobe.binaries' => env('FFPROBE_BINARIES')
            ]);
            $video = $ffmpeg->open($record->path);
            $duration = FFMpeg\FFProbe::create([
                'ffmpeg.binaries'  => env('FFMPEG_BINARIES'),
                'ffprobe.binaries' => env('FFPROBE_BINARIES')
            ])
            ->format($record->path)
            ->get('duration');
            $record->duration = round($duration);
            $thumbnail_image =substr(Crypt::encryptString($file_name),5,10).".jpg";
            $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1))->save("uploads/thumbnails/".$thumbnail_image);
            $record->thumbnail = "uploads/thumbnails/".$thumbnail_image;
        } else {
            $record->type = "audio";
            $record->thumbnail = "uploads/thumbnails/audio.jpg";
            $duration = FFMpeg\FFProbe::create([
                'ffmpeg.binaries'  => env('FFMPEG_BINARIES'),
                'ffprobe.binaries' => env('FFPROBE_BINARIES')
            ])
            ->format($record->path)
            ->get('duration');
            $record->duration = round($duration);
        }
        $record->save();
        return response()->json(["status"=> "success","resource"=>$record, "resourceHtml"=>view("resourceItem", ["resource"=>$record])->render()]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $project_id = $request->project_id;
        Resource::find($id)->delete();
        Item::where("project_id", "=", $project_id)->where("resource_id", "=", $id)->delete();
        $items = Item::where("project_id", "=", $project_id)->orderBy("updated_at", "asc")->get();
        $components = array();
        foreach($items as $item) {
            $component = view("component", ["resource" => $item->resource])->render();
            array_push($components, $component);
        }
        return response()->json(["status"=>"success", "components" => $components]);
    }

    public function project($hash) {
        
    }

    public function getComponent($resource_id) {
        $resource = Resource::find($resource_id);
        $project = Project::where("hashkey", "=", $resource->project_id)->first();
        
        $item = new Item;
        $item->project_id = $project->id;
        $item->resource_id = $resource->id;
        $item->i_start = 0;
        $item->i_end = $resource->duration;
        $item->save();
        return view("component", ["resource"=>$resource, "range"=>$this->range])->render();
    }
}
