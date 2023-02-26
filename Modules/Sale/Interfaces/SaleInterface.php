<?php

namespace Modules\Sale\Interfaces;

interface SaleInterface
{
    // Add Sale
    public function addSale($request);

    // Edit Sale
    public function updateSale($request, $sale);
}
