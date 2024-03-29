<?php

namespace Modules\Purchase\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Financial\Entities\Accounting\Account;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function purchaseDetails() {
        return $this->hasMany(PurchaseDetail::class, 'purchase_id', 'id');
    }

    public function purchasePayments() {
        return $this->hasMany(PurchasePayment::class, 'purchase_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Purchase::max('id') + 1;
            $model->reference = make_reference_id('PR', $number);
        });
    }

    public function scopeCompleted($query) {
        return $query->where('status', 'Completed');
    }

    /**
     * Scope a query to only include sales which belong to the current company.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeisCompany($query, $company)
    {
        return $query->where('company_id', $company);
    }


    public function getShippingAmountAttribute($value) {
        return $value / 100;
    }

    public function getPaidAmountAttribute($value) {
        return $value / 100;
    }

    public function getTotalAmountAttribute($value) {
        return $value / 100;
    }

    public function getDueAmountAttribute($value) {
        return $value / 100;
    }

    public function getTaxAmountAttribute($value) {
        return $value / 100;
    }

    public function getDiscountAmountAttribute($value) {
        return $value / 100;
    }
}
