<?php

declare(strict_types=1);

namespace App\Domain\Auth\Logout;

use Illuminate\Support\Facades\Auth;

class LogoutService
{
    public function logoutUser()
    {
        Auth::logout();
    }
}
