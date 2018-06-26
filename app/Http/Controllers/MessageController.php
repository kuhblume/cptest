<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Group;
use Illuminate\Support\Facades\Auth;
use JD\Cloudder\Facades\Cloudder;

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

        $create_message->image_path = 'aa';


//        $image = $request->file('image_name');
//        $name = $request->file('image_name')->getClientOriginalName();
//
//        $image_name = $request->file('image_name')->getRealPath();;
//        Cloudder::upload($image_name, null);
//        list($width, $height) = getimagesize($image_name);
//        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
//        //save to uploads directory
//        $image->move(public_path("uploads"), $name);
//        //Save images
//        $this->saveImages($request, $image_url);
//        return redirect()->back()->with('status', 'Image Uploaded Successfully');

        $this->validate($request,[
            'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);
        $image_name = $request->file('image_name')->getRealPath();
        Cloudder::upload($image_name, null);



//        $image_path1 = $request->file('image_path1')->getRealPath();;
//        Cloudder::upload($image_path1, null);
        $image_name = Cloudder::show(Cloudder::getPublicId());
//        $create_message->image_path = $request->file('image_name')->getClientOriginalName();//送信者の画像のディレクトリ情報
        $create_message->image_path = $image_name;


        $create_message->save();
        return redirect('message_rooms/'.$request->input('group_id'));
    }
    public function delete(Request $request){
         Message::where('id',$request->input('message_id'))->delete();
         return redirect('message_rooms/'.$request->input('group_id'));
    }
}
