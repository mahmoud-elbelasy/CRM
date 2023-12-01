<?php

namespace Crm\Customer\Services\Export;

use Crm\Customer\Services\Export\ExportInterface;

class ExportPdf implements ExportInterface
{

    public function export($data)
    {
        dd('pdf format');
    }
}
