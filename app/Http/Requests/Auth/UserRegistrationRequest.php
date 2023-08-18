<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


/**
 * ユーザー登録 (Request)
 * @author Syuduki
 */
class UserRegistrationRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストを行う権限があるかどうかを判断する
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * リクエストに適用されるバリデーションルールを取得する
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ['required', 'string', Rule::unique('App\Models\User')],
            "loginId" => ['required', 'string', 'max:20', Rule::unique('App\Models\User', 'login_id')],
            "password" => ['required', 'string', 'min:7'],
            'email' => ['required', 'email', Rule::unique('App\Models\User')],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ユーザー名を入力してください。',
            'name.unique' => '入力されたユーザー名はすでに使用されています。',
            'loginId.required' => 'ログインIDを入力してください。',
            'loginId.unique' => '入力されたログインIDはすでに使用されています。',
            'password.required' => 'ログインIDを入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスの書式を確認してください。',
            'email.unique' => '入力されたメールアドレスはすでに使用されています。',
        ];
    }
}
