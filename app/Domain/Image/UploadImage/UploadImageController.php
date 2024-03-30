<?php

declare(strict_types=1);

namespace App\Domain\Image\UploadImage;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;

class UploadImageController extends BaseController
{
    private $service;

    public function __construct(UploadImageService $service)
    {
        $this->service = $service;
    }

    public function __invoke(UploadImageRequest $request)
    {
        $this->service->uploadImage($request);

        return back()->with('success', 'Успешно качихте вашата снимка.');
    }
}
