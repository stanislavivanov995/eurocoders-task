<?php

declare(strict_types=1);

namespace App\Domain\Profile\UpdateProfile;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;

class UpdateProfileController extends BaseController
{
    private $service;

    public function __construct(UpdateProfileService $service)
    {
        $this->service = $service;
    }

    public function __invoke(UpdateProfileRequest $request)
    {
        $this->service->updateProfile($request);

        return back()->with('success', 'Успешно редактирахте вашия профил.');
    }
}
