<?php

declare(strict_types=1);

namespace App\Domain\Image\ShowImageUpload;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;

class ShowImageUploadController extends BaseController
{
    public function __invoke(): View
    {
        return view('clients.image-upload');
    }
}
