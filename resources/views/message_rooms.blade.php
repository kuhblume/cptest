<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>

@foreach($messages as $message)
    <li>{{$message}}</li>
    <hr>
@endforeach
<form role="form" method="post" action="message_rooms">
    {{-- CSRF対策 --}}
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="text" name="post_body" placeholder="名前を文字を入力してください" required autofocus>
    <button type="submit">送信</button>
</form>
</body>