<?php

declare(strict_types=1);

namespace App\Domain\Image\ListImages;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use App\Models\Image;

class ListImagesController extends BaseController
{
    public function __invoke(): View
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(10);
        return view('clients.images.list', compact('images'));
    }
}
