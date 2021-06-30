<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Resource;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $project = Project::where("user_id", "=", $user_id)->orderBy("updated_at", "desc")->first();
        if(empty($project)) {
            return view("create_project");
        }else {
            $hash = $project->hashkey;
            return redirect(route('project', ["hash"=>$hash]));
        }
    }

}
