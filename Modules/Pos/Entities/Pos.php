<?php

namespace Modules\Pos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Company;
use Modules\Pos\Abstracts\Pos as PosModel;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Sale\Entities\Sale;
use Illuminate\Database\Eloquent\Builder;

class Pos extends PosModel
{
    protected $table = 'pos';

    protected $fillable = [
        'name',
        'code',
        'address',
        'company_id'
    ];
    protected $guarded = [];

}
