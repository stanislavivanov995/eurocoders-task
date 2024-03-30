<?php

declare(strict_types=1);

namespace App\Domain\Ticket\StoreTicket;

use App\Http\Controllers\Controller as BaseController;

class StoreTicketController extends BaseController
{
    private $service;

    public function __construct(StoreTicketService $service)
    {
        $this->service = $service;
    }

    public function __invoke(StoreTicketRequest $request)
    {
        $ticket = $this->service->storeTicket($request);

        // $this->service->sendSystemEmail($ticket);

        return back()->with('success', 'Успешно изпратихте съобщение.');
    }
}
