<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";
//    public function joins(){
//        return $this->belongsToMany('App\Join','joins','group_name','user_id');
//    }
//    public function users(){
//        return $this->belongsToMany('App\User');
//    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
}
