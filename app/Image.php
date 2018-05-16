<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function message(){
        return $this->belongsTo('App\Message');
    }
}
