<?php

declare(strict_types=1);

namespace App\Domain\Auth\Register;

use App\Domain\Auth\Register\RegisterRepository;

class RegisterService
{
    private $repository;

    public function __construct(RegisterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register($request)
    {
        return $this->repository->registerUser($request);
    }

    public function login($request)
    {
        return $this->repository->loginUser($request);
    }
}
