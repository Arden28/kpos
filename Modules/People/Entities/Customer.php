<?php

namespace Modules\People\Entities;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{

    use HasFactory;

    protected $guarded = [];


    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    protected static function newFactory() {
        return \Modules\People\Database\factories\CustomerFactory::new();
    }

    // Appartient à une company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
