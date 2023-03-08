<?php

namespace Modules\Pos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Company;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Sale\Entities\Sale;

class Pos extends Model
{
    use HasFactory;

    protected $table = 'pos';

    protected $fillable=  ['name', 'company_id'];
    protected $guarded = [];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function physical_pos_sessions() {
        return $this->hasMany(PhysicalPosSession::class, 'pos_id', 'id');
    }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
