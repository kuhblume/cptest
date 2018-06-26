<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
<h1>招待するユーザー</h1>
<p>※一人だけ選択すると個人チャットになり、グループ名は固定されます</p>
</nav>
<br>
<form role="form" method="post" action="{{ route('createRoom') }}">
    @method('post')
    <input type="hidden" name="_token" value="{{csrf_token()}}">{{-- CSRF対策 --}}
    <input type="hidden" name="users[]" value="{{Auth::user()->id}}">
    @foreach($users as $user)
        @if(Auth::user()->id == $user->id){{--自分以外を表示する。forですべてをifに通すのは効率悪い？？注：自分を配列の一番最初にもっていったほうが後の処理が楽、現在のコントローラはそうしないと望まない結果が出る--}}
            @else
            <li><input type="checkbox" name="users[]" value="{{$user->id}}">{{$user->name}}</li>{{--フォロー中のユーザー、テスト時は全ユーザー、配列--}}
        @endif
    @endforeach
    <hr>
    <li>ルーム名：<input type="form" name="room_name"></li>
    <hr>
    <button type="submit">ルーム作成</button>
</form>
</body>

{{--現状はすべてのユーザーがここに表示される--}}