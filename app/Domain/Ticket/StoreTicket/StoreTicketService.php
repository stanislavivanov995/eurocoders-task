<?php

declare(strict_types=1);

namespace App\Domain\Ticket\StoreTicket;

class StoreTicketService
{
    private $repository;

    public function __construct(StoreTicketRepository $repository)
    {
        $this->repository = $repository;
    }

    public function storeTicket($request)
    {
        return $this->repository->storeTicket($request);
    }

    public function sendSystemEmail($ticket)
    {
        return $this->repository->sendSystemEmail($ticket);
    }
}
