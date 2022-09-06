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
            <div class='form_item'>
                <label>アカウント名</label>
                <input class='create_account_input' type='text' name='account_name' placeholder='20文字以内の自由なアカウント名'>
            </div>

            <div class='form_item'>
                <label>ユーザー名</label>
                <input class='create_account_input' type='text' name='user_name' placeholder='20文字以内英数の @ から始まるユーザー名'>
            </div>

            <div class='form_item'>
                <label>メールアドレス</label>
                <input class='create_account_input' type='email' name='email' placeholder='あなたのメールアドレス'>
            </div>

            <div class='form_item'>
                <label>パスワード</label>
                <input class='create_account_input' type='text' name='password' placeholder='8文字以上英数のパスワード'>
            </div>

            {{ csrf_field() }}

            <div class='form_item'>
                <input type='submit' value='次へ'>
            </div>
        </form>
    </div>
</div>
