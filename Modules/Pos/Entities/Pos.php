<?php

namespace Modules\Pos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Company;
use Modules\Pos\Abstracts\Pos as PosModel;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Sale\Entities\Sale;
use Illuminate\Database\Eloquent\Builder;
use Modules\Financial\Entities\Accounting\Account;

class Pos extends PosModel
{
    protected $table = 'pos';

    protected $fillable = [
        'name',
        'code',
        'address',
        'company_id',
        'account_id'
    ];
    protected $guarded = [];

    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }


}
