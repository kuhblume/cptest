<?php

namespace App\Http\Controllers;

use App\User;
use App\Join;
use App\Group;
use Illuminate\Http\Request;

class CreateRoomController extends Controller
{
    public function show(){//招待可能なユーザーを取得、bladeでチェックボックスとともに一覧表示
        $users = User::all();
        return view('create_message_room',['users' => $users],['notice'=>'test']);
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
            $new_group->group_name ='グループ';//ここでグループ名決定ページに飛ばせばいいのでは
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
//    public  function  val(Request $request){
//        $validate_rule = [
//            'users[]' => 'unique:joins,user_id,joins,group_id'
//        ];
//        $this->validate($request,$validate_rule);
//        return view('create_message_room',['notice'=>'aaaaaa']);
//    }
}