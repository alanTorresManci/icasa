<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = \Auth::user()->projects;
        return view('admin.projects.index')
                ->with([
                    'section' => 'projects',
                    'projects' => $projects,
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        try {
            $serviceAccount = ServiceAccount::fromJsonFile(config('constants.firebase.key'));

            $firebase = (new Factory)->withServiceAccount($serviceAccount)
            ->withDatabaseUri(config('constants.firebase.database_read'))
            ->create();
            $database = $firebase->getDatabase();
            foreach ($project->variables as $variable) {
                $values = $database->getReference($variable->reference)->getSnapshot()->getValue();
                if ($values) {
                    $variable->data()->create([
                        'variable_id' => $variable->id,
                        'value' => $values[$variable->name],
                    ]);
                }
            }

        } catch (Exception $e) {

        }

        return view('admin.projects.show')
                ->with([
                    'section' => 'projects',
                    'project' => $project,
                ]);
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
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
