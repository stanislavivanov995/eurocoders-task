<?php

declare(strict_types=1);

namespace App\Domain\Ticket\ShowTicketForm;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\View;

class ShowTicketFormController extends BaseController
{
    public function __invoke(): View
    {
        return view('clients.tickets.show');
    }
}
