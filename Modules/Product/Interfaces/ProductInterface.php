<?php

namespace Modules\Classes\Interfaces;

interface ProductInterface
{
    public function getProducts($company);

    public  function getProductStock($company);
}
