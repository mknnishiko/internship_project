<?php

namespace App\Http\Controllers;

use App\Http\Request\User\CreateRequest;
use App\Models\User;
use App\UseCases\User\Create as CreateUseCase;


class UserController extends Controller
{
    /**
     * 新しいユーザーを作成
     *
     */
    public function create(CreateRequest $request, CreateUseCase $createUC)
    {

        // バリデーション済みデータの取得
        $data = $request->validated();

        // アカウント作成処理の呼び出し
        $newUser = $createUC->invoke($data);

        // ビューを返す
        return view('pages.home');
    }
}
