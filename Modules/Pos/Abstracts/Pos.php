<?php

namespace Modules\Pos\Abstracts;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Modules\Pos\Entities\CashPos;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\PosSale;
use Modules\Sale\Entities\Sale;

class Pos extends Model
{
    use HasFactory, Notifiable;

    // public function scopeIsActive(Builder $query, $current_pos_id)
    // {
    //     return $query->where('id', $current_pos_id);
    // }

    /**
     * Get the owner of the pos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    public function cash_pos()
    {
        return $this->hasOne(CashPos::class, 'pos_id', 'id');
    }

    public function physical_pos_sessions()
    {
        return $this->hasMany(PhysicalPosSession::class, 'pos_id', 'id');
    }

    public function currentPosSession($pos)
    {
        return $this->physical_pos_sessions()
                    ->where('id', $pos)
                    ->where('is_active', true)
                    ->latest('created_at');
    }

    // public function sales()
    // {
    //     return $this->hasMany(Sale::class, 'pos_id', 'id');
    // }

    public function pos_sales()
    {
        return $this->hasMany(PosSale::class, 'pos_id', 'id');
    }

}
