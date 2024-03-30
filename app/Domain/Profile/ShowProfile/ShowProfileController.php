<?php

declare(strict_types=1);

namespace App\Domain\Profile\ShowProfile;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;
use App\Models\User;

class ShowProfileController extends BaseController
{
    public function __invoke(): View
    {
        return view('clients.profile.show');
    }
}
