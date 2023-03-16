<?php

namespace Modules\People\Interfaces;

interface SupplierInterface
{
    public function getSuppliers($company);
    public function create($request);

    public function edit($request, $customer);
}
