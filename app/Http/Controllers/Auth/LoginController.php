<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    /**
     * ログイン ページの表示
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.login');
    }

    /**
     * ログイン処理
     * 
     * @param App\http\Requests\Auth\LoginRequest $request
     * @return Illuminate\Routing\Redirector
     */
    public function login(LoginRequest $request)
    {
        // 入力情報だけ取得
        $credentials = $request->getCredentials();

        // 入力情報が正しくない場合リダイレクト
        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        // ここよく分かってない（ユーザー情報の取得？）
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // ログイン
        Auth::login($user);

        // リダイレクト
        return redirect('/home');
    }
}
