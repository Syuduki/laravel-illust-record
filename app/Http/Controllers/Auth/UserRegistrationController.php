<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegistrationRequest;
use App\Usecases\Auth\UserRegistrationUsecase;

class UserRegistrationController extends Controller
{

    /**
     * ユーザー登録 (Controller)
     * @author Syuduki
     */
    public function __invoke(UserRegistrationRequest $request, UserRegistrationUsecase $usecase)
    {
        try{
            DB::beginTransaction();
            $userParam = $request->only([
                'name',
                'loginId',
                'email',
                'password',
            ]);
            $usecase($userParam);
            DB::commit();
            return response()->json(["data" => [], "messages" => "登録成功"], 200);
        } catch (\Exception $e){
            DB::rollback();
            return response()->json(["data" => [], "messages" => $e->getMessage()], 400);
        }

    }
}
