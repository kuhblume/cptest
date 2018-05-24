<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @foreach($groups as $group)
        <li><a href='message_rooms/{{$group->id}}'>{{$group->group_name}}</a></li>
        <hr>
    @endforeach
    <a href="create_message_room">ルーム作成</a>
</body>