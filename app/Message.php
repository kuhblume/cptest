<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function groups(){
        return $this->belongsTo('App\Group');
    }
    public function images(){
    return $this->hasMany('App\Image');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}