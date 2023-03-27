<?php

namespace Modules\Pos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashAction extends Model
{
    use HasFactory;

    protected $fillable = ['cash_id', 'pos_id', 'action', 'amount', 'note'];

    /**
     * Get the company that the invitation belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cash_pos()
    {
        return $this->belongsTo(CashPos::class);
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Pos\Database\factories\CashActionFactory::new();
    // }
}
