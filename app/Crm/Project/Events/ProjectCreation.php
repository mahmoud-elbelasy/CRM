<?php

namespace Crm\Project\Events;

use Crm\Customer\Models\customer;
use Crm\Project\Models\project;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private Project $project;
    /**
     * Create a new event instance.
     */
    public function __construct(Project $project)
    {
        $this->setProject($project);
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project): void
    {
        $this->project = $project;
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
