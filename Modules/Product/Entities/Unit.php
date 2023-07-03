<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'unit_name',
        'unit_short_name',
        'is_decimal',
        'is_multiple',
        'parent_unit_id',
        'value'
    ];


    public function scopeCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function unit() {
        return $this->belongsTo(Unit::class, 'parent_unit_id', 'id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'unit_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Product\Database\factories\UnitFactory::new();
    // }

}
