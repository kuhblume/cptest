<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Join;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
//    public  function index(){
//        $groups = Group::all();
//        return view('message',['groups' => $groups]);
//    }

    public  function show(){//
//        $users = User::find(Auth::user()->id);//ログインしているユーザーのユーザーテーブルを取得---ここでは不要だった
//        $joins = DB::table('joins')->where('user_id',Auth::user()->id)->get();//DBクラスを使った記述
        if(isset(Auth::user()->id)){//非ログイン時のエラーを回避(null時に処理を行わない)
            $joins = Join::where('user_id',Auth::user()->id)->get();
            return view('message',['groups' => $joins]);
        }else{
            //非ログイン時の処理
        }
    }
}
