<?php

namespace Modules\Expense\Entities;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Modules\Financial\Entities\Accounting\Account;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function category() {
        return $this->belongsTo(ExpenseCategory::class, 'category_id', 'id');
    }


    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
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


    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Expense::max('id') + 1;
            $model->reference = make_reference_id('EXP', $number);
        });
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d M, Y');
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = ($value * 100);
    }

    public function getAmountAttribute($value) {
        return ($value / 100);
    }
}
