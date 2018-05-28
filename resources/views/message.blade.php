<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <h1>あなたの参加しているルーム</h1>
</nav>
<br>
    @foreach($groups as $group)
        <li><a href='message_rooms/{{$group->id}}'>{{$group->group_name}}</a></li>
        <hr>
    @endforeach
    <hr>
    <hr>
    <a href="create_message_room">ルーム作成</a>
</body>