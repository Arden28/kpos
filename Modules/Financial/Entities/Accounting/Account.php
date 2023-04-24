<?php

namespace Modules\Financial\Entities\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Expense\Entities\ExpenseCategory;
use Modules\Pos\Entities\Pos;
use Modules\Purchase\Entities\Purchase;
use Modules\Sale\Entities\Sale;
use Modules\Financial\Entities\Accounting\AccountBook;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = ['account_name', 'company_id', 'number', 'type_id', 'balance', 'details', 'note', 'is_active', 'user_id'];

    // protected $guarded = ['company_id', 'user_id'];

    public function company() {

        return $this->belongsTo(Company::class, 'company_id', 'id');

    }

    public function books() {

        return $this->hasMany(AccountBook::class, 'account_id', 'id');

    }

    public function pos() {

        return $this->hasMany(Pos::class, 'account_id', 'id');

    }

    public function sales() {

        return $this->hasMany(Sale::class, 'account_id', 'id');

    }

    public function purchases() {

        return $this->hasMany(Purchase::class, 'account_id', 'id');

    }

    public function expenseCategory() {

        return $this->hasMany(ExpenseCategory::class, 'account_id', 'id');

    }

    // public function books() {

    //     return $this->hasMany(AccountBook::class, 'account_id', 'id');

    // }
    // public function type() {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Financial\Database\factories\AccountFactory::new();
    // }
}
