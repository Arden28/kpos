<?php

namespace Modules\Inventory\Interfaces;

interface ProductInterface
{
    public function getProducts($company);

    public  function getProductStock($company);
}
