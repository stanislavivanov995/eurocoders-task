<?php

declare(strict_types=1);

namespace App\Domain\Admin\Home;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use App\Models\{Image, User};

class HomeController extends BaseController
{
    public function __invoke(): View
    {
        $latestUsers = User::latest()->take(5)->get();

        $latestImages = Image::with('user')->latest()->take(5)->get();

        return view('admin.home', compact('latestUsers', 'latestImages'));
    }
}
