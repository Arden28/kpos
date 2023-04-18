<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Product\Database\factories\UnitFactory::new();
    // }

}
