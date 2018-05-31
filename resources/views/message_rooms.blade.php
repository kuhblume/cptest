<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"></head>
<body>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <form role="form" method="post" action="message_rooms">{{--退出処理＞joinから二つのidが一致するレコードを消せばいい？--}}
        @method('delete'){{--formのpostからlaravelの機能を使ってdeleteに結び付ける--}}
        <input type="hidden" name="_token" value="{{csrf_token()}}">{{-- CSRF対策 --}}
        <input type="hidden" name="group_id" value="{{$group_id}}">
        <input type="hidden" name="is_room" value="true">
        <button type="submit">退出</button>
    </form>
</nav>
<br>
@foreach($messages as $message)
        @if($message->user_id == Auth::user()->id)
            <li>{{$message}}</li>
            <li>{{mb_convert_encoding($message->message_body, "utf-8", "auto")}}
            <form role="form" action="message_rooms" method="post">
                @method('delete'){{--formのpostからlaravelの機能を使ってdeleteに結び付ける--}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">{{-- CSRF対策 --}}
                <input type="hidden" name="message_id" value="{{$message->id}}">
                <input type="hidden" name="group_id" value="{{$group_id}}">
                <button type="submit">削除</button>
            </form>
        @else
            <li style="text-align: right">{{$message}}</li>
            <li style="text-align: right">{{mb_convert_encoding($message->message_body, "utf-8", "auto")}}</li>{{-- ここのエンコードは絶対別の方法で解決できるはずてか文字コード統一忘れてるだけなのでは--}}
        @endif
    <hr>
@endforeach
<form role="form" method="post" action="message_rooms">
    <input type="hidden" name="_token" value="{{csrf_token()}}">{{-- CSRF対策 --}}
    <input type="hidden" name="group_id" value="{{$group_id}}">
    <input type="text" name="message_body" placeholder="名前を文字を入力してください" required autofocus>
    <button type="submit">送信</button>
</form>
{{--ルーム退出ボタン未作成--}}
</body>

{{--actionの意味とは--}}