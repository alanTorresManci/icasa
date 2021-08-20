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
        'image'
    ];
    public function variables(){
        return $this->hasMany(Variable::class);
    }
    public function client(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getListVariableValuesAttribute(){
        $data = [];
        foreach ($this->variables as $variable){
            $data[] = [
                'type' => "text",
                'title' => $variable->name,
                'description' => $variable->data->last()->value." ".$variable->units,
                'position' => [
                        'left' => $variable->position_x,
                        'top' => $variable->position_y - 60,
                ]
            ];
        }
        return json_encode($data);
    }

    public function getListVariablesAttribute(){
        $data = [];
        foreach ($this->variables as $variable){
            $data[] = [
                'type' => "text",
                'title' => $variable->name,
                'description' => $variable->units,
                'position' => [
                        'left' => $variable->position_x,
                        'top' => $variable->position_y,
                ]
            ];
        }
        return json_encode($data);
    }
}
