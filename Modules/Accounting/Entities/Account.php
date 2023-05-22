<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $table='class_accounts';

    protected $fillable = [
        'chart_of_account_id',
        'account_class_id',
        'code',
        'entitled',
        'initial_balance',
        'parent_account_code',
        'parent_account_id',
        'short_name',
        'vta_rate',
        'counterparty_account',
        'planned_budget',
        'budget_real',
        'remaining_budget',
        'status',
        'notes',
        'description'
    ];

    public function accountingClass(){
        return $this->belongsTo(AccountingClass::class, 'account_class_id', 'id');
    }


    // protected static function newFactory()
    // {
    //     return \Modules\Accounting\Database\factories\AccountFactory::new();
    // }

}
