<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserService {

    public function userCreate($request): void
    {
        $user = [
            'name'=> $request->input('name'),
            'password'=> Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
        if (User::where('name', $request->input('name'))->first() === null) {
            User::class::create($user);
        }
    }

}
