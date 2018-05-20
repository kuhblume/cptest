<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @foreach($groups as $group)
        <li><a href='message_rooms'>{{$group->group_name}}</a></li>
        <hr>
    @endforeach
    <?php
    if (Auth::check()){
        echo '<h2>ようこそ</h2>';
        $user = Auth::user();
        echo $user->name,"さん</br>";
    }else{
        echo '<h2>ログイン</h2>';
    }
    ?>



</body>