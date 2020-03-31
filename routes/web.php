<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin_projects.index');
});

Route::get('prueba', function(Illuminate\Http\Request $request){
    return json_encode(['status' => 'recibidio', 'code' => 200]);
});


Route::middleware('auth')->group(function() {
    Route::resource('admin_projects', 'AdminProjectsController')->middleware('admin');
    Route::resource('clients', 'ClientsController')->middleware('admin');
    Route::resource('variables', 'VariablesController')->middleware('admin');
    Route::resource('projects', 'ProjectsController')->middleware('client');
    Route::get('/home', function(){
        return redirect()->route('admin_projects.index');
    })->name('home');
});

Auth::routes();

Route::get('logout', function(){
    \Auth::logout();
    return back();
})->name('admin.logout');
