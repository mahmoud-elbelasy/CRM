<?php

namespace Crm\Project\Services;

use Crm\Project\Events\ProjectCreation;
use Crm\Project\Models\project;
use Crm\Project\Requests\CreateProjectRequest;

class ProjectService
{
    public function createProject($request, $customer_id)
    {
        $project = project::create(
            [
                'project_name' => $request->project_name,
                'status' => (bool)$request->status,
                'project_cost' => $request->project_cost,
                'customer_id' => $customer_id,
            ]
        );
        event(new ProjectCreation($project));
        return $project;
    }
}
