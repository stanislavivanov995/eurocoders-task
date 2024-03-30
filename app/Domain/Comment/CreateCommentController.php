<?php

declare(strict_types=1);

namespace App\Domain\Comment;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class CreateCommentController extends BaseController
{
    private $service;

    public function __construct(CreateCommentService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $this->service->createComment($request);
        return back();
    }
}
