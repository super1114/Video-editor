<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use FFMpeg;
class ResourceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
        } else if (strpos($mimeType, "video")!==false) {
            $record->type = "video";
            $ffmpeg = FFMpeg\FFMpeg::create([
                'ffmpeg.binaries'  => env('FFMPEG_BINARIES'),
                'ffprobe.binaries' => env('FFPROBE_BINARIES')
            ]);
            $video = $ffmpeg->open($record->path);
            $thumbnail_image =substr(Crypt::encryptString($file_name),5,10).".jpg";
            $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1))->save("uploads/thumbnails/".$thumbnail_image);
            $record->thumbnail = "uploads/thumbnails/".$thumbnail_image;
        } else {
            $record->type = "audio";
            $record->thumbnail = "uploads/thumbnails/audio.jpg";
        }
        $record->save();
        
        //$resources = Resource::where("project_id", "=", $project_hash)->get();
        return response()->json(["status"=> "success","resource"=>$record]);
    }

    public function project($hash) {
        
    }
}
