<?php

namespace Modules\Product\Interfaces;

interface ProductInterface
{
    public function getProducts($company);

    public  function getProductStock($company);
}
