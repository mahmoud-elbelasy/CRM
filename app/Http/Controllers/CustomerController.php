<?php

namespace App\Http\Controllers;

use Crm\Customer\Exceptions\InvalidExportFormat;
use Crm\Customer\Requests\CreateCustomerRequest;
use Crm\Customer\Services\CustomerExportService;
use Crm\Customer\Services\CustomerService;
use Crm\Customer\Services\Export\ExportFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CustomerController extends Controller
{
    protected CustomerService $customerService;
    protected CustomerExportService $customerExport;
    public function __construct(CustomerService $customerService,CustomerExportService $customerExport)
    {
        $this->customerService = $customerService;
        $this->customerExport = $customerExport;
    }

    public function index(Request $request)
    {
        return $this->customerService->index($request);
    }

    public function show($id)
    {

        return $this->customerService->show($id) ?? response()->json(['status'=>'not found'], ResponseAlias::HTTP_NOT_FOUND);

    }

    public function create(CreateCustomerRequest $request)
    {


        return $this->customerService->create($request);
    }

    public function update(Request $request,$id)
    {
        return $this->customerService->update($request, $id);
    }

    public function delete(Request $request)
    {
        return $this->customerService->delete($request);
    }

    /**
     * @throws InvalidExportFormat
     */
    public function export(Request $request){
        $format = $request->get('format','json');
        $exporter = ExportFactory::instance($format);
        $this->customerExport->export($exporter);
    }
}
