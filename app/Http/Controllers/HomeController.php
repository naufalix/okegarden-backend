<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

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
        return view('home',[
            "title" => "Projects",
            "projects" => Project::all()
        ]);
    }

    public function postHandler(Request $request)
    {
        
        if($request->tipe=="store"){
            $request->validate(['nama'=>'required','keterangan'=>'required','status'=>'required',]);
            $project = new Project;
            $project->nama       = $request->nama;
            $project->keterangan = $request->keterangan;
            $project->status     = $request->status;
            $project->save();
            return view('home',[
                "success" => "Project berhasil ditambahkan",
                "projects" => Project::all()
            ]);
        }
        
        if($request->tipe=="update"){
            $request->validate(['id'=>'required','nama'=>'required','keterangan'=>'required','status'=>'required',]);
            $project = Project::find($request->id);
            $project->nama       = $request->nama;
            $project->keterangan = $request->keterangan;
            $project->status     = $request->status;
            $project->save();
            return view('home',[
                "success" => "Project berhasil diedit",
                "projects" => Project::all()
            ]);
        }

        if($request->tipe=="delete"){
            $request->validate(['id'=>'required',]);
            $project = Project::find($request->id);
            $project->delete();
            return view('home',[
                "success" => $project->nama." berhasil dihapus",
                "projects" => Project::all()
            ]);
        }
            
    }

}
