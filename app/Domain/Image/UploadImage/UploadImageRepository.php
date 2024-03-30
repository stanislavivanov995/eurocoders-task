<?php

declare(strict_types=1);

namespace App\Domain\Image\UploadImage;

use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class UploadImageRepository
{
    public function uploadImage($request)
    {
        $imageName = time().'.'.$request->name->extension();
        $request->name->move(public_path('images'), $imageName);

        Image::create([
            'user_id' => Auth::id(),
            'name' => $imageName,
            'description' => $request->description
        ]);
    }
}
