<?php

declare(strict_types=1);

namespace App\Domain\Image\DeleteImage;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class DeleteImageController extends BaseController
{
    public function __invoke($id): RedirectResponse
    {
        $image = Image::findOrFail($id);

        $image->comments()->delete();

        $imagePath = public_path('images/' . $image->name);
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $image->delete();

        return redirect()->route('list.images');
    }
}
