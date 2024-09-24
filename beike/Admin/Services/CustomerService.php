<?php

namespace Beike\Admin\Services;

use Beike\Repositories\CustomerRepo;

class CustomerService
{
    public static function create($data)
    {
        $data['locale'] = system_setting('base.locale');
        $data['from']   = 'admin';
        $customer       = CustomerRepo::create($data);

        return $customer;
    }
}
