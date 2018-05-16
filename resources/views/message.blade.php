<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @foreach($groups as $group)
{{--        <li>{{ $group->group_name }}</li>--}}
    @endforeach
{{$groups}}
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