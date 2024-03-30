<?php

declare(strict_types=1);

namespace App\Domain\Auth\Login;

use App\Http\Controllers\Controller as BaseController;

class LoginController extends BaseController
{
    private $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    public function __invoke(LoginRequest $request)
    {
        return $this->service->loginUser($request);
    }
}
