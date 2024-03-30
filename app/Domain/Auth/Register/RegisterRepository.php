<?php

declare(strict_types=1);

namespace App\Domain\Auth\Register;

use App\Models\User;
use Illuminate\Support\Facades\{Auth, Hash};

class RegisterRepository
{
    public function registerUser($request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function loginUser($request)
    {
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
    }
}
