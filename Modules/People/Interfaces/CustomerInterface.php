<?php

namespace Modules\People\Interfaces;

interface CustomerInterface
{

    public function getCustomers($company);
    public function create($request);

    public function edit($request, $customer);
}
