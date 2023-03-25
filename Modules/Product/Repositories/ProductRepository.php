<?php

namespace Modules\Product\Repositories;

use Modules\Product\Interfaces\ProductInterface;
use Modules\Product\Entities\Product;

class ProductRepository implements ProductInterface
{

    public function getProducts($company){
        return Product::where('company_id', $company)->get();
    }

    public  function getProductStock($company){
        $this->getProducts($company)->sum('qty');
    }
}
