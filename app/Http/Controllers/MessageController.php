<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Group;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function show($id)
    {//
        if(isset(Auth::user()->id)) {
//            $messages = User::find(Auth::user())->first()->messages->where('group_id',$id);//whereでさらに絞り込む///messages_tableの持つgroup_idが$idと一致したもののみ取得->ユーザーからさらに絞ったためユーザー一致かつグループ一致となってしまった
            $messages = Group::find($id)->messages;//groupからリレーションを使いmessagesを呼び出す
            return view('message_rooms', ['messages' => $messages],['group_id'=>$id]);
        }
    }
    public function create(Request $request)
    {//storeでもよさそう
        $create_message = new Message;
        $create_message->group_id = $request->input('group_id');
        $create_message->user_id = Auth::user()->id;
        $create_message->message_body = $request->input('message_body');
        $create_message->save();
        return redirect('message_rooms/'.$request->input('group_id'));
    }
    public function deleteMessage(Request $request){
         Message::where('id',$request->input('message_id'))->delete();
         return redirect('message_rooms/'.$request->input('group_id'));
    }
}
