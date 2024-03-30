<?php

declare(strict_types=1);

namespace App\Domain\Auth\Register;

use App\Http\Controllers\Controller as BaseController;

class RegisterController extends BaseController
{
    private $service;

    public function __construct(RegisterService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RegisterRequest $request)
    {
        $this->service->register($request);
        $this->service->login($request);
    }
}
