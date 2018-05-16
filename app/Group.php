<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function joins(){
        return $this->belongsToMany('App\Join');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
}
