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
        $project_hash = $request->project_hash;
        $file_name = $resource->getClientOriginalName();
        if(!file_exists("uploads/".$project_hash)){
            mkdir("uploads/".$project_hash, 0777);
        }
        $resource->move("uploads/".$project_hash, $file_name);
        $record = new Resource;
        $record->name = $resource;
        //$record->type = $resource->getMimeType();
        if(strpos($resource->getMimeType(), "image")>0) {
            $record->type = "image";
            $record->thumbnail = "uploads/".$project_hash."/".$file_name;
        } else if (strpos($resource->getMimeType(), "video")>0) {
            $record->type = "video";
            $thumbnails = new FFMPEG;
            //$sss = $thumbnails->getThumbnails("uploads/".$project_hash."/".$file_name, 'thumbnails', 1);
            //dd($sss);
        } else {
            $record->type = "audio";
        }
        $record->path = "uploads/".$project_hash."/".$file_name;
        $record->project_id = $project_hash;

        return response()->json(["status"=> "success","resources"=>"zzz"]);
    }

    public function project($hash) {
        
    }
}
