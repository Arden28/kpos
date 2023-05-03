<?php

namespace Modules\Financial\Entities\Accounting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountType extends Model
{
    use HasFactory;

    protected $table = 'account_types';

    protected $fillable = [];

//     protected static function newFactory()
//     {
//         return \Modules\Financial\Database\factories\Accounting/AccountTypeFactory::new();
//     }
}
