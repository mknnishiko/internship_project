@extends('layouts.base')

@section('content')

<div class='container'>
    <div class='section padding-top-70'>
        <h2>ログイン</h2>

        @if ($errors->any())
            <div class='alert'>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action='/login' method='POST'>
            @csrf
            <div class='flex-column margin-bottom-12'>
                <label>メールアドレス または ユーザー名</label>
                <input type='text' class='form-control' name='user_name' placeholder='メールアドレス または @ から始まるユーザー名'>
            </div>

            <div class='flex-column margin-bottom-12'>
                <label>パスワード</label>
                <input type='text' class='form-control' name='password' placeholder='設定したパスワード'>
            </div>

            <div class='flex-column'>
                <input type='submit' class='btn btn-primary' value='次へ'>
            </div>
        </form>
    </div>
</div>
