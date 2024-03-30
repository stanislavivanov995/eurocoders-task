<?php

declare(strict_types=1);

namespace App\Domain\Comment;

class CreateCommentService
{
    private $repository;

    public function __construct(CreateCommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createComment($request)
    {
        return $this->repository->createComment($request);
    }
}
