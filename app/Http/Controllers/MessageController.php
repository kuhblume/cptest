<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function  show(){
        return view('message_rooms');
    }
    public  function  create(){

    }
    public function  leavingRoom(){

    }
}
