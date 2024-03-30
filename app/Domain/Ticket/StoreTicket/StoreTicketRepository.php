<?php

declare(strict_types=1);

namespace App\Domain\Ticket\StoreTicket;

use App\Models\Ticket;
use App\Mail\TicketCreated;
use Illuminate\Support\Facades\Mail;

class StoreTicketRepository
{
    public function storeTicket($request)
    {
        Ticket::create($request->all());
    }

    public function sendSystemEmail($ticket)
    {
        Mail::to('system@example.com')->send(new TicketCreated($ticket));
    }
}
