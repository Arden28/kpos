<?php

namespace Modules\Inventory\Repositories;

use Modules\Inventory\Interfaces\ProductInterface;
use Modules\Inventory\Entities\Product;

class ProductRepository implements ProductInterface
{

    public function getProducts($company){
        return Product::where('company_id', $company)->get();
    }

    public  function getProductStock($company){
        $this->getProducts($company)->sum('qty');
    }
}
