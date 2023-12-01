<?php

namespace Crm\Customer\Repositories;

use Crm\Base\Repositories\Repository;
use Crm\Customer\Models\customer;

class CustomerRepository extends Repository
{

    public function __construct(customer $customer)
    {
        $this->setModel($customer);
    }


}
