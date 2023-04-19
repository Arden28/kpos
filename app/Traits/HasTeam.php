<?php

namespace App\Traits;

use App\Abstracts\Membership;
use App\Models\Company;
use App\Models\Team;
use App\Models\User;

trait HasTeam{


    /**
     * Get the current company of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ownedTeam()
    {
        return $this->HasOne(Team::class, 'user_id');
    }

}
