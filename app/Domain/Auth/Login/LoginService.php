<?php

declare(strict_types=1);

namespace App\Domain\Auth\Login;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function loginUser($request)
    {
        if ($request->is_admin == 1) {
            return back()->withErrors(["wrong_credentials" => 'Нямате права за достъп.']);
        }

        $result = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($result === false){
            return back()
            ->withErrors(["wrong_credentials" => 'Грешно име или парола.']);
        }else{
            return back();
        }
    }
}
