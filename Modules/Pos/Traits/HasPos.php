<?php

namespace Modules\Pos\Traits;

use App\Abstracts\Membership;
use Modules\Pos\Entities\Pos;
use App\Models\User;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\PosSale;
use Modules\Sale\Entities\Sale;

trait HasPos{

    /**
     * Determine if the given pos is the current pos.
     *
     * @param  mixed  $pos
     * @return bool
     */
    public function isCurrentPos($pos)
    {
        return $pos->id === $this->currentPos->id;
    }

    /**
     * Get the current pos of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentPos()
    {
        return PhysicalPosSession::find(session('pos_session_id'))->first();

        // if (is_null($this->current_pos_id) && $this->id) {
        //     $this->switchPos($this->is_active);
        // }

        // return $this->belongsTo(Pos::class, 'current_pos_id');
    }

    /**
     * Get the current pos of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function getSessionSales($pos_session)
    {
        return PosSale::where('pos_session_id',$pos_session)
                ->with('sale')->get();

    }

    public function getSessionCashTransactions($pos_session){

        return PosSale::where('pos_session_id',$pos_session)
                ->with('sale', Sale::where('payment_method', 'Cash')->get())->get();
    }

    public function switchPos($pos)
    {
        if (! $this->belongsToPos($pos)) {
            return false;
        }

        $this->forceFill([
            'current_pos_id' => $pos->id,
        ])->save();

        $this->setRelation('currentpos', $pos);

        return true;
    }
    /**
     * Get all of the pos the company owns or belongs to.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allPos()
    {
        return $this->ownedPos->merge($this->pos)->sortBy('name');
    }

    /**
     * Get all of the companies the user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownedPos()
    {
        return $this->hasMany(Pos::class);
    }

    /**
     * Get all of the pos the company belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pos()
    {
        return $this->belongsToMany(Pos::class);
    }

    /**
     * Determine if the user belongs to the given company.
     *
     * @param  mixed  $pos
     * @return bool
     */
    public function belongsToPos($pos)
    {
        if (is_null($pos)) {
            return false;
        }

        return $this->ownsPos($pos) || $this->pos->contains(function ($c) use ($pos) {
            return $c->id === $pos->id;
        });
    }

}
