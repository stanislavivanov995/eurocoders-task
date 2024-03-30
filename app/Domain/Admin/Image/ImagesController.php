<?php

declare(strict_types=1);

namespace App\Domain\Admin\Image;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use App\Models\{Image, User};

class ImagesController extends BaseController
{
    public function __invoke(): View
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.images', compact('images'));
    }
}
