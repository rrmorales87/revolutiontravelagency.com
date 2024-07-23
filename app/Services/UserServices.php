<?php

namespace App\Services;


use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class UserServices
{
    /**
     * @param UserRequest $userRequest
     * @return bool|User
     */
    public function register(UserRequest $userRequest): bool|User
    {
        try {

            $user = new User($userRequest->all());
            $user->password = bcrypt($userRequest->password);
            $user->save();
            return $user;
        }catch (QueryException $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * @param Request $userRequest
     * @return bool
     */
    public function authenticate(Request $userRequest): bool
    {
        try {

            $claves = ['email'=>$userRequest->email,'password'=>$userRequest->password];
            if(Auth::attempt($claves))
                return true;
            return false;
        }catch (QueryException $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return Auth::check() && Auth::user()->roles == 'admin';
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function changeRole(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $user->roles = $request->roles;
        return $user->save();

    }
}