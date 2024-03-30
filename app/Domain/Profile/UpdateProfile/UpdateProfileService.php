<?php

declare(strict_types=1);

namespace App\Domain\Profile\UpdateProfile;

class UpdateProfileService
{
    private $repository;

    public function __construct(UpdateProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function updateProfile($request)
    {
        return $this->repository->updateProfile($request);
    }
}
