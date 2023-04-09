<?php

namespace Modules\Financial\Entities\Accounting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountAction extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'account_id', 'user_id', 'amount', 'type', 'detail', 'note', 'date'];

    public function company() {
        return $this->belongsTo(company::class, 'company_id', 'id');
    }

    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Financial\Database\factories\Accounting/AcoountActionFactory::new();
    // }
}
