<?php

namespace Crm\User\Services;

use Crm\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create($request){
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }
}
