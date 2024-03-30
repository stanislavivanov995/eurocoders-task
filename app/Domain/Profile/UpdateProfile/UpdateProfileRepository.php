<?php

declare(strict_types=1);

namespace App\Domain\Profile\UpdateProfile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRepository
{
    public function updateProfile($request)
    {
        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
