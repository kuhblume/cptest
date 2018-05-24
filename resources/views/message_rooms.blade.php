<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
@foreach($messages as $message)
    <li>{{$message}}</li>
    <li>{{mb_convert_encoding($message->message_body, "utf-8", "auto")}}
        <form action="message_rooms" method="post">
            @method('delete')
            <input type="hidden" name="_token" value="{{csrf_token()}}">{{-- CSRF対策 --}}
            <input type="hidden" name="message_id" value="{{$message->id}}">
            <input type="hidden" name="group_id" value="{{$group_id}}">
            <button type="submit">削除</button>
        </form>
    </li>{{-- ここのエンコードは絶対別の方法で解決できるはずてか文字コード統一忘れてるだけなのでは--}}
    <hr>
@endforeach
<form role="form" method="post" action="message_rooms">
    <input type="hidden" name="_token" value="{{csrf_token()}}">{{-- CSRF対策 --}}
    <input type="hidden" name="group_id" value="{{$group_id}}">
    <input type="text" name="message_body" placeholder="名前を文字を入力してください" required autofocus>
    <button type="submit">送信</button>
</form>
</body>

{{--actionの意味とは--}}