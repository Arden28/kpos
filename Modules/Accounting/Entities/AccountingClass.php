<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountingClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'chart_of_account_id', 'is_active',
    ];


    public function chart_of_account(){
        return $this->belongsTo(ChartOfAccount::class, 'chart_of_account_id', 'id');
    }

    public function accounts(){
        return $this->hasMany(Account::class, 'account_class_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Accounting\Database\factories\AccountingClassFactory::new();
    // }
}
