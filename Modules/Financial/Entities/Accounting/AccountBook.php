<?php

namespace Modules\Financial\Entities\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountBook extends Model
{
    use HasFactory;

    protected $table = 'account_books';

    protected $fillable = ['company_id', 'account_id', 'detail', 'note', 'user_id', 'credit', 'debit', 'balance', 'date'];


    public function company() {
        return $this->belongsTo(company::class, 'company_id', 'id');
    }

    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Financial\Database\factories\Accounting/AccountBookFactory::new();
    // }

}
