<?php

declare(strict_types=1);

namespace App\Domain\Admin\Auth;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function showLogin(): View
    {
        return view('admin.login');
    }

    public function doLogin(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin === 1) {
                return redirect()->route('admin.home');
            } else {
                Auth::logout();
                return redirect('/')->with('error', 'Нямате достъп до администраторския панел.');
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Грешно потребителско име или парола']);
        }
    }
}
