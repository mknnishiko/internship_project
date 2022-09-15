<?php

namespace App\Http\Controllers;

use App\Http\Request\User\CreateRequest;
use App\Models\User;
use App\UseCases\User\Create as CreateUseCase;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * サインアップ ページの表示
     * 
     * @return Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.signup');
    }

    /**
     * 新規ユーザー登録
     * 
     * @param App\Http\Request\User\CreateRequest $request
     * @param App\UseCases\User\Create as CreateUseCase $createUC
     * @return Illuminate\Routing\Redirector
     */
    public function create(CreateRequest $request, CreateUseCase $createUC)
    {

        // バリデーション済みデータの取得
        $data = $request->validated();

        // アカウント作成処理の呼び出し
        $newUser = $createUC->invoke($data);

        // ログイン
        Auth::login($newUser);

        // リダイレクト
        return redirect('/home');
    }
}
