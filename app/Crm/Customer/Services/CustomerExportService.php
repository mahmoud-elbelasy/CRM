<?php

namespace Crm\Customer\Services;

use App\Crm\Customer\Exceptions\InvalidExportFormat;
use Crm\Customer\Repositories\CustomerRepository;
use Crm\Customer\Services\Export\ExportHtml;
use Crm\Customer\Services\Export\ExportInterface;
use Crm\Customer\Services\Export\ExportJson;
use Crm\Customer\Services\Export\ExportPdf;

class CustomerExportService
{
    private CustomerRepository $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function export(ExportInterface $exporter){
        $customers = $this->customerRepository->all();
        $exporter->export($customers->toArray());



    }

}
