<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Variable;
use App\User;

class Project extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
    ];
    public function variables(){
        return $this->hasMany(Variable::class);
    }
    public function client(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
