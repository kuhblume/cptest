<?php

namespace App\Http\Controllers;

use App\User;
use App\Join;
use App\Group;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateRoomController extends Controller
{
    public function show(){//招待可能なユーザーを取得、bladeでチェックボックスとともに一覧表示
        $users = User::all();
        return view('create_message_room',['users' => $users]);
    }
    public function create(Request $request)//チェックボックスをユーザーを取得しforで回してそれぞれデータベースに挿入
    {//storeでもよさそう
        $join_users = (array)$request->input('users');
        $new_group = new Group;
        if(count($join_users)==2){
            $new_group->group_name ='個人ルーム:'.User::where('id',$join_users[1])->first()->name;//全く同じ個人ルームが出来ないようにしたい。最悪、個人ルームを強制的に決め、同名の物をはじく
            $new_group->save();
        }elseif(count($join_users)==1){
            //誰も選択していないときの処理////バリデーションではじくほうがいいかもしれない
            return redirect('message');
        }else{
            $new_group->group_name =$request->input('room_name');//ここでグループ名決定ページに飛ばせばいいのでは
            $new_group->save();
        }
        foreach ($join_users as $join_user){
            $new_room = new Join;
            $new_room->group_id = $new_group->id;
            $new_room->user_id = $join_user;
            $new_room->save();
        }
        return redirect('message');
    }
    public function quitRoom(Request $request){
//        Join::destroy($request->input('group_id'));
//        Join::destroy(User::where('group_id','group_id')->id);
//        Join::destroy(Group::find($request->input('group_id'))->first()->join->where('user_id',Auth::user()));
        // クエリ条件にマッチした最初のレコード取得
//        if($request->input('is_room')){
            Join::where('user_id', Auth::user()->id)->where('group_id',$request->input('group_id'))->first()->delete();

        return redirect('message');
//        }else{
//            return redirect('message_rooms/'.$request->input('group_id'));
//        }
    }
}
//            $messages = User::find(Auth::user())->first()->messages->where('group_id',$id);//whereでさらに絞り込む///messages_tableの持つgroup_idが$idと一致したもののみ取得->ユーザーからさらに絞ったためユーザー一致かつグループ一致となってしまった
//ぐるーぷー＞じょいん