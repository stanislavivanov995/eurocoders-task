<?php

declare(strict_types=1);

namespace App\Domain\Image\ShowImage;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use App\Models\Image;

class ShowImageController extends BaseController
{
    public function __invoke($id): View
    {
        $image = Image::findOrFail($id);
        return view('clients.images.show', compact('image'));
    }
}
