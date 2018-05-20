<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $table = "joins";
//    public $fillable = ['user_id', 'group_id'];

//    public function groups(){
//        return $this->belongsToMany('App\Group', 'grttoups', 'user_id', 'group_name');
//    }

//    public function users(){
//        return $this->belongsToMany('App\User');
//    }
}
