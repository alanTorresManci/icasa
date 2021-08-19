<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Data;

class Variable extends Model
{
    //
    protected $fillable = [
        'project_id',
        'name',
        'live',
        'read_only',
        'write_only',
        'units',
        'reference',
        'position_x',
        'position_y',
    ];
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function data(){
        return $this->hasMany(Data::class);
    }
}
