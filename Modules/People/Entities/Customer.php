<?php

namespace Modules\People\Entities;

use App\Models\Common\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{

    use HasFactory;

    protected $guarded = [];

    protected static function newFactory() {
        return \Modules\People\Database\factories\CustomerFactory::new();
    }

    // Appartient à une company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
