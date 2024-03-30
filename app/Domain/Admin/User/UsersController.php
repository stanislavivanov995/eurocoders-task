<?php

declare(strict_types=1);

namespace App\Domain\Admin\User;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use App\Models\{Image, User};

class UsersController extends BaseController
{
    public function listUsers(): View
    {
        $latestUsers =  User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.users', compact('latestUsers'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->images->delete();
        $user->comments->delete();
        $user->delete();
        return back()->with('success', 'Потребителят беше успешно изтрит.');
    }

    public function getUserImages($id)
    {
        $user = User::findOrFail($id);
        $images = $user->images;

        return response()->json($images);
    }

}
