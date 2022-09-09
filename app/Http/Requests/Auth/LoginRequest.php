<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_name' => 'required',
            'password' => 'required'
        ];
    }

    // 入力情報の取得
    public function getCredentials()
    {
        // リクエストから user_name の取得
        $user_name = $this->get('user_name');

        // user_name にメールアドレスが入っていた場合
        if ($this->isEmail($user_name)) {
            // email と password を返す
            return [
                'email' => $user_name,
                'password' => $this->get('password')
            ];
        }

        // user_name と password を返す
        return $this->only('user_name', 'password');
    }

    // $user_name が(正しい)メールアドレスかの判定
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['user_name' => $param],
            ['user_name' => 'email']
        )->fails();
    }
}
