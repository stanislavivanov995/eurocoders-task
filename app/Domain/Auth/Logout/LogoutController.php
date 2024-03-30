<?php

declare(strict_types=1);

namespace App\Domain\Auth\Logout;

use App\Http\Controllers\Controller as BaseController;

class LogoutController extends BaseController
{
    private $service;

    public function __construct(LogoutService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $this->service->logoutUser();
        return back();
    }
}
