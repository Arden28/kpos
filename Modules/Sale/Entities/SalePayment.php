<?php

namespace Modules\Sale\Entities;

use App\Models\Common\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class SalePayment extends Model
{

    use HasFactory;

    protected $guarded = [];


    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function sale() {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value) {
        return $value / 100;
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d M, Y');
    }

    public function scopeBySale($query) {
        return $query->where('sale_id', request()->route('sale_id'));
    }
    public function scopeByCompany($query) {
        return $query->where('company_id', request()->route('company_id'));
    }
}
