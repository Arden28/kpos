<?php

namespace Modules\Inventory\Repositories;

use Modules\Inventory\Interfaces\CategoryInterface;
use Modules\Inventory\Entities\Category;

class CategoryRepository implements CategoryInterface
{

    public function getCategories($company){

        return Category::where('company_id', $company)->get();
    }
}
