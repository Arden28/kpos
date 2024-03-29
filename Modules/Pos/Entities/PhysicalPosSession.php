<?php

namespace Modules\Pos\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Traits\HasPos;
use Modules\Sale\Entities\Sale;

class PhysicalPosSession extends Model
{
    use HasFactory, HasPos;

    protected $fillable = ['pos_id', 'user_id', 'company_id', 'start_date', 'start_amount', 'note', 'is_active', 'start_stock_price_value', 'start_stock_cost_value', 'end_stock_price_value', 'start_stock_cost_value'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }

    public function pos() {
        return $this->belongsTo(Pos::class, 'pos_id', 'id');
    }

    public function pos_sales()
    {
        return $this->hasMany(PosSale::class, 'pos_session_id', 'id');
    }
    public function sales()
    {
        return $this->hasMany(Sale::class, 'pos_id', 'id');
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
