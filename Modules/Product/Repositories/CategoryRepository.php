<?php

namespace Modules\Product\Repositories;

use Modules\Product\Interfaces\CategoryInterface;
use Modules\Product\Entities\Category;

class CategoryRepository implements CategoryInterface
{

    public function getCategories($company){

        return Category::where('company_id', $company)->get();
    }
}
