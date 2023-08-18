<?php

namespace App\Usecases\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


/**
 * ユーザー登録 (Usecase)
 * @author Syuduki
 */
class UserRegistrationUsecase
{
    public function __invoke($request)
    {
        $user = new User;
        $user->fill([
            'name' => $request["name"],
            'login_id' => $request["loginId"],
            'email' => $request["email"],
            'password' => Hash::make($request["password"]),
            'icon_path' => "",
        ]);
         return $user->save();
    }
}
