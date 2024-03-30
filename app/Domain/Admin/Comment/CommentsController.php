<?php

declare(strict_types=1);

namespace App\Domain\Admin\Comment;

use App\Http\Controllers\Controller as BaseController;
use App\Models\Comment;

class CommentsController extends BaseController
{
    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back()->with('success', 'Коментарът беше успешно изтрит.');
    }
}
