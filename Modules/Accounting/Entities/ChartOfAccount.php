<?php

namespace Modules\Accounting\Entities;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChartOfAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'entitled', 'type', 'class', 'company_id'
    ];

    public function accountingClass(){
        return $this->hasMany(AccountingClass::class, 'chart_of_account_id', 'id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Accounting\Database\factories\ChartOfAccountFactory::new();
    // }
}
