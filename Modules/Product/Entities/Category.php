<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }


    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
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
