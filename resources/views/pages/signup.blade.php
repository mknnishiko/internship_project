@extends('layouts.base')

@section('content')
<div class='container'>
    <div class='section'>
        <h2>アカウントを作成</h2>

        @if ($errors->any())
            <div class='alert'>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action='/signup' method='POST'>
            @csrf
            <div class='flex-column margin-bottom-12'>
                <label>アカウント名</label>
                <input type='text' class='form-control' name='account_name' placeholder='20文字以内の自由なアカウント名'>
            </div>

            <div class='flex-column margin-bottom-12'>
                <label>ユーザー名</label>
                <input type='text' class='form-control' name='user_name' placeholder='20文字以内英数の @ から始まるユーザー名'>
            </div>

            <div class='flex-column margin-bottom-12'>
                <label>メールアドレス</label>
                <input type='email' class='form-control' name='email' placeholder='あなたのメールアドレス'>
            </div>

            <div class='flex-column margin-bottom-12'>
                <label>パスワード</label>
                <input type='text' class='form-control' name='password' placeholder='8文字以上英数のパスワード'>
            </div>

            <div class='flex-column'>
                <input type='submit' class='btn btn-primary' value='次へ'>
            </div>
        </form>
    </div>
</div>
