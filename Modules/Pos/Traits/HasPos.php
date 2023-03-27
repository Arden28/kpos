<?php

namespace Modules\Pos\Traits;

use App\Abstracts\Membership;
use Modules\Pos\Entities\Pos;
use App\Models\User;

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
        if (is_null($this->current_pos_id) && $this->id) {
            $this->switchPos($this->is_active);
        }

        return $this->belongsTo(Pos::class, 'current_pos_id');
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
     * Get all of the pos the company belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pos()
    {
        return $this->belongsToMany(Pos::class);
    }


}
