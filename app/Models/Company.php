<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Abstracts\Company as CompanyModel;
use Illuminate\Database\Eloquent\Builder;

class Company extends CompanyModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'personal_company',
        'enabled'
    ];

    public function isActive(Builder $builder) {
        return $builder->where('enabled', 1);
    }

}
