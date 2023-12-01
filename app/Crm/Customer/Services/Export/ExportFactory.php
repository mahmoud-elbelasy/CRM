<?php

namespace Crm\Customer\Services\Export;

use Crm\Customer\Exceptions\InvalidExportFormat;

class ExportFactory
{
    public static function instance(string $format): ExportInterface
    {
        $handler = config('export.exporters')[$format] ?? null;

        if (! $handler){
            throw new InvalidExportFormat(sprintf('Format %s Is Invalid',$format));
        }


        return new $handler;


    }
}
