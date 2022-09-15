<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * ユーザーの権限の取得
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーションルールの取得
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_name' => 'required',
            'password' => ['required', 'alpha_num', Password::min(8)]
        ];
    }

    /**
     * 入力情報の取得
     * 
     * @return array
     */
    public function getCredentials()
    {
        // リクエストから user_name の取得
        $user_name = $this->get('user_name');

        if ($this->isEmail($user_name)) {
            return [
                'email' => $user_name,
                'password' => $this->get('password')
            ];
        }

        return $this->only('user_name', 'password');
    }

    /**
     * メールアドレスの判定
     *
     * @param $param
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['user_name' => $param],
            ['user_name' => 'email']
        )->fails();
    }
}
