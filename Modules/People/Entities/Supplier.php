<?php

namespace Modules\People\Entities;

use App\Models\Common\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
