<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
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
        $project->user_id = Auth::user()->id;
        $project->save();
        return redirect(route('project', ["hash"=>$hash_key]));
    }

    public function project($hash) {
        $user_id = Auth::user()->id;
        $project = Project::where("hashkey", "=", $hash)->first();
        $resources = Resource::where("project_id", "=", $hash)->get();
        $projects = Project::where("user_id", "=", $user_id)->orderBy("updated_at", "desc")->get();
        return view("home", ["project_name" => $project->name, "project_hash" => $hash, "projects" => $projects, "resources" => $resources]);
    }
}
