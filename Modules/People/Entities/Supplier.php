<?php

namespace Modules\People\Entities;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory() {
        return \Modules\People\Database\factories\SupplierFactory::new();
    }

    // Appartient à une company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // Possède des produits
    public function products()
    {
        return $this->belongsTo(Product::class, 'supplier_id', 'id');
    }
}
