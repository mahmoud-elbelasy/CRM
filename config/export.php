<?php

return [
    'exporters' => [
  'json' => new \Crm\Customer\Services\Export\ExportJson(),
  'html' => new \Crm\Customer\Services\Export\ExportHtml(),
  'pdf' => new \Crm\Customer\Services\Export\ExportPdf(),
    ]
];
