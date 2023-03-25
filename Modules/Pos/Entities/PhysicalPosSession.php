<?php

namespace Modules\Pos\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Entities\Pos;
use Modules\Sale\Entities\Sale;

class PhysicalPosSession extends Model
{
    use HasFactory;

    protected $fillable = ['pos_id', 'user_id', 'company_id', 'start_date', 'start_amount', 'note', 'is_active'];

    public function isActive(Builder $builder) {
        return $builder->where('is_active', 1);
    }

    public function pos() {
        return $this->belongsTo(Pos::class, 'pos_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'pos_id', 'id');
    }
}
