<?php

declare(strict_types=1);

namespace App\Domain\Home;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use App\Models\Image;

class HomeController extends BaseController
{
    public function __invoke(): View
    {
        $images = Image::latest()->take(10)->get();
        return view('home', compact('images'));
    }
}
