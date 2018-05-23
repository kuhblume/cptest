<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
    }
    public function  show($id){//
        $messages = User::find(Auth::user())->first()->messages;
        return view('message_rooms',['messages'=>$messages]);
    }
    public  function  create(Request $request){//storeでもよさそう
        $create_message = new Message;
        $create_message->group_id = $request->input('room_id');
        $create_message->user_id = Auth::user()->id;
        $create_message->message_body = $request->input('post_body');
        $create_message->save();
        return redirect('message_rooms');
    }
}
