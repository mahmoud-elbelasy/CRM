<?php

namespace Crm\Customer\Services\Export;

use Crm\Customer\Services\Export\ExportInterface;

class ExportHtml implements ExportInterface
{

    public function export($data)
    {
        dd('html format');
    }
}
