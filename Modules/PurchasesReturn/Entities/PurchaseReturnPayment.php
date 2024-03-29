<?php

namespace Modules\PurchasesReturn\Entities;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Modules\Financial\Entities\Accounting\Account;

class PurchaseReturnPayment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function purchaseReturn() {
        return $this->belongsTo(PurchaseReturn::class, 'purchase_return_id', 'id');
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

    public function scopeByPurchaseReturn($query) {
        return $query->where('purchase_return_id', request()->route('purchase_return_id'));
    }
}
