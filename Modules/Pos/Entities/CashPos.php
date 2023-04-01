<?php

namespace Modules\Pos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashPos extends Model
{
    use HasFactory;

    protected $fillable = ['pos_id', 'amount', 'stated_amount'];

    /**
     * Get the company that the invitation belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pos()
    {
        return $this->belongsTo(Pos::class);
    }

    public function cash_actions()
    {
        return $this->hasMany(CashAction::class, 'cash_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     // return \Modules\Pos\Database\factories\CashPosFactory::new();
    // }
}
