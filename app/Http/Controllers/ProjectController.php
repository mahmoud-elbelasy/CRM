<?php

namespace App\Http\Controllers;

use Crm\Customer\Services\CustomerService;
use Crm\Project\Requests\CreateProjectRequest;
use Crm\Project\Services\ProjectService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProjectController extends Controller
{
    private $projectService;
    private $customerService;

    public function __construct(ProjectService $projectService, CustomerService $customerService)
    {
        $this->projectService = $projectService;
        $this->customerService = $customerService;
    }

    public function createProject(CreateProjectRequest $request, $customer_id)
    {
        $customer = $this->customerService->show($customer_id);
//        return $customer;
        if(! $customer){
            return response()->json(['status'=>'customer not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        return $this->projectService->createProject($request, $customer_id);
    }
}
