<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";
    public function joins(){
        return $this->hasMany('App\Join');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
}
