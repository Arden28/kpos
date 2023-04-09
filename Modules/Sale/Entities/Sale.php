<?php

namespace Modules\Sale\Entities;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Entities\PosSale;
use Modules\Sale\Database\factories\SaleFactory;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $guarded = [];


    // public function isPos(Builder $builder) {
    //     return $builder->where('pos_id');
    // }

    public function pos()
    {
        return $this->belongsTo(PosSale::class, 'pos_id', 'id' );
    }

    public function pos_sales()
    {
        return $this->hasMany(PosSale::class, 'sale_id', 'id' );
    }

    public function physical_pos_session() {
        return $this->belongsTo(PhysicalPosSession::class, 'pos_id', 'id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function saleDetails() {
        return $this->hasMany(SaleDetails::class, 'sale_id', 'id');
    }

    public function salePayments() {
        return $this->hasMany(SalePayment::class, 'sale_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Sale::max('id') + 1;
            $model->reference = make_reference_id('SL', $number);
        });
    }

    public function scopeCompleted($query) {
        return $query->where('status', 'Completed');
    }

    /**
     * Scope a query to only include sales with cash payment method.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCashPayment($query): Builder
    {
        return $query->where('payment_method', 'Cash');
    }

    /**
     * Determine if the sale's payment method is cash.
     *
     * @return bool
     */
    public function isCashPayment()
    {
        return $this->payment_method === 'Cash';
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

    protected static function newFactory()
    {
        return SaleFactory::new();
    }
}
