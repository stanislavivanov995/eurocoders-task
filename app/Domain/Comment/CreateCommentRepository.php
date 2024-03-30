<?php

declare(strict_types=1);

namespace App\Domain\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CreateCommentRepository
{
    public function createComment($request)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'image_id' => $request->image_id,
            'text' => $request->text
        ]);
    }
}
