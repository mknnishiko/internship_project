<?php

namespace App\UseCases\User;

use App\Models\User;
use Hash;

/**
 * アカウント作成処理
 */
class Create
{
    public function invoke(array $data):User
    {
        // パスワードのハッシュ化処理
        $data['password'] = Hash::make($data['password']);

        // アカウント作成処理
        $newUser = User::create($data);

        return $newUser;
    }
}
