<?php

namespace App\Models;

use App\Traits\HasTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Abstracts\Company as CompanyModel;
use Illuminate\Database\Eloquent\Builder;
use Modules\Pos\Traits\HasPos;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends CompanyModel implements HasMedia
{
    use HasTeam, Notifiable, InteractsWithMedia;
    // use HasPos;
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

    protected $with = ['media'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/' . md5($this->attributes['name']));
    }

    public function isActive(Builder $builder) {
        return $builder->where('enabled', 1);
    }

}
