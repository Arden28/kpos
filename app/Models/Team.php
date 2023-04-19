<?php

namespace App\Models;

use App\Abstracts\Team as TeamModel;
use Bpuig\Subby\Traits\HasSubscriptionPeriodUsage;
use Bpuig\Subby\Traits\HasSubscriptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends TeamModel
{
    use HasFactory, HasSubscriptions, HasSubscriptionPeriodUsage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'is_active'
    ];

}
