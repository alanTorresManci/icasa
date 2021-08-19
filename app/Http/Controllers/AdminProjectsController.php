<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('admin.admin_projects.index')
                ->with([
                    'projects' => $projects,
                    'section' => 'admin_projects'
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = User::whereIs('client')
                    ->orderBy('name')
                    ->get();
        return view('admin.admin_projects.create')
                ->with([
                    'clients' => $clients,
                    'section' => 'admin_projects'
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'image' => 'required|image',
        ];
        $request->validate($rules);

        $project = Project::create($request->except(['image']));
        $name = uniqid()."_".$project->id.".".$request->file('image')->extension();
        $path = $request->file('image')->storeAs(
            'project_images', $name, 'public'
        );
        $project->image = $path;
        $project->save();
        return redirect()->route('admin_projects.show', ['project' => $project]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $project = Project::findOrFail($id);

        $clients = User::whereIs('client')
                    ->orderBy('name')
                    ->get();
        return view('admin.admin_projects.show')
                ->with('clients', $clients)
                ->with('section', 'admin_projects')
                ->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'image' => 'image'
        ];
        $request->validate($rules);
        $project = Project::findOrFail($id);
        $project->update($request->except(['image']));
        if($request->has('image')){
            $name = uniqid()."_".$project->id.".".$request->file('image')->extension();
            $path = $request->file('image')->storeAs(
                'project_images', $name, 'public'
            );
            $project->image = $path;
            $project->save();
        }
        return redirect()->route('admin_projects.show', ['project' => $project]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $project = Project::findOrFail($id);
        if($project->variables != null){
            $project->variables()->delete();
        }
        $project->delete();
        return back();
    }
}
