<?php

declare(strict_types=1);

namespace App\Domain\Image\UploadImage;

use Illuminate\Support\Facades\Auth;

class UploadImageService
{
    private $repository;

    public function __construct(UploadImageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function uploadImage($request)
    {
        $userImagesCount = Auth::user()->images()->count();

        if ($userImagesCount > 9) {
            return back()->with('error', 'Не можете да качвате повече от 10 снимки.');
        }

        $this->repository->uploadImage($request);
    }
}
