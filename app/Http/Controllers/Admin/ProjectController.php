<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\functions\Helper as Help;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects= Project::all();
        return view('admin.projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exist= Project::where('title', $request->title)->first();
        if($exist){
            return redirect()->route('admin.project.index')->with('error', 'categoria gia esistentte');
        }else{
            $new= new Project();
            $new->title = $request->title;
            $new->slug = Help::getSlug($new->title, Project::class);
            $new->save();
            return redirect()->route('admin.project.index')->with('success', 'categoria creata');



        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
       $val_data= $request->validate([
        'title'=> 'required|min:2|max:50'
       ],
       [
         'title.required'=>'devi inserire il titolo dell project',
         'title.min'=>'devi avere almeno 2 caratteri',
         'title.max'=>'devi avere al massimo 50 caratteri',



       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
