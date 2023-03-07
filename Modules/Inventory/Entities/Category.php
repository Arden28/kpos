<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }


    /**
     * Get the company that owns the products categories.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }
}
