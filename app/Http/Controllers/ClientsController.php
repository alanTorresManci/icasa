<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = User::whereIs('client')
                    ->orderBy('name')
                    ->get();
        return view('admin.clients.index')
                ->with([
                    'clients' => $clients,
                    'section' => 'clients'
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
        return view('admin.clients.create')
                ->with([
                    'section' => 'clients'
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ];
        $request->validate($rules);
        $client = User::create($request->all());
        $client->assign('client');
        return redirect()->route('clients.show', $client);
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
        $client = User::findOrFail($id);
        return view('admin.clients.show')
                ->with([
                    'section' => 'clients',
                    'client' => $client
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
            'name' => 'required',
            'password' => 'confirmed'
        ];
        $request->validate($rules);
        $client = User::findOrFail($id);

        $client->update($request->all());
        return redirect()->route('clients.show', $client);

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
        $client = User::findOrFail($id);
        foreach ($client->projects as $key => $project) {
            if($project->variables != null){
                $project->variables()->delete();
            }
            $project->delete();
        }

        $client->delete();
        return redirect()->route('clients.index');
    }
}
