<?php

declare(strict_types=1);

namespace App\Domain\User\ListUsers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use App\Models\User;

class ListUsersController extends BaseController
{
    public function __invoke(): View
    {
        $users = User::withCount('images')->orderBy('images_count', 'desc')->paginate(10);
        return view('clients.users.list', compact('users'));
    }
}
