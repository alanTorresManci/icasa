<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variable;
use App\Models\Project;


class VariablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $variables = Variable::all();
        return view('admin.variables.index')
                ->with([
                    'variables' => $variables,
                    'section' => 'variables'
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
        $projects = Project::all();
        return view('admin.variables.create')
                ->with([
                    'section' => 'variables',
                    'projects' => $projects,
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
            'name' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'units' => 'required|string',
            'live' => 'required|boolean',
            'reference' => 'required|string',
            'write_only' => 'required|boolean',
            'read_only' => 'required|boolean',
        ];
        $request->validate($rules);
        $variable = Variable::create($request->all());
        return redirect()->route('variables.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $variable = Variable::findOrFail($id);
        $projects = Project::all();
        return view('admin.variables.show')
                ->with([
                    'variable' => $variable,
                    'projects' => $projects,
                    'section' => 'variables',
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'name' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'units' => 'required|string',
            'live' => 'required|boolean',
            'reference' => 'required|string',
            'write_only' => 'required|boolean',
            'read_only' => 'required|boolean',
        ];
        $request->validate($rules);
        $variable = Variable::findOrFail($id);
        $variable->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $variable = Variable::findOrFail($id);
        $variable->delete();
        return back();
    }
}
