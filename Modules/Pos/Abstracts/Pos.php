<?php

namespace Modules\Pos\Abstracts;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Pos extends Model
{
    use HasFactory, Notifiable;

    /**
     * Get the owner of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function physical_pos_sessions() {
        return $this->hasMany(PhysicalPosSession::class, 'pos_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
