<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class ProjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }

    
    public function create(Request $request, $project_name)
    {
        $hash_key = substr(Crypt::encryptString($project_name),5,10);
        $project = new Project;
        $project->name = $project_name;
        $project->hashkey = $hash_key;
        $project->status = 1;
        $project->save();
        return redirect(route('project', ["hash"=>$hash_key]));
    }

    public function project($hash) {
        $project = Project::where("hashkey", "=", $hash)->first();
        $resources = Resource::where("project_id", "=", $project->id)->get();
        //dd($resources);
        $projects = Project::orderBy("updated_at", "desc")->get();
        return view("home", ["project_name" => $project->name, "project_hash" => $hash, "projects" => $projects, "resources" => $resources]);
    }
}
