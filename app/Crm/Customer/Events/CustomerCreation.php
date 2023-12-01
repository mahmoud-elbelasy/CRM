<?php

namespace Crm\Customer\Events;

use Crm\Customer\Models\customer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private customer $customer;
    /**
     * Create a new event instance.
     */
    public function __construct(customer $customer)
    {
        $this->setCustomer($customer);
    }

    public function getCustomer(): customer
    {
        return $this->customer;
    }

    public function setCustomer(customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
