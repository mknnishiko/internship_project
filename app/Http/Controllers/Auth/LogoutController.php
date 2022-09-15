<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
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
     * ログアウト処理
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        // ログアウト
        Auth::logout();

        // セッションの破棄
        $request->session()->invalidate();

        // トークンの再生成
        $request->session()->regenerateToken();

        // リダイレクト
        return redirect('/login');
    }
}
