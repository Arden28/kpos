<?php

namespace App\Models;

use App\Models\Company;
use App\Traits\HasCompany;
use Bpuig\Subby\Traits\HasSubscriptionPeriodUsage;
use Bpuig\Subby\Traits\HasSubscriptions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Pos\Entities\PosSale;
use Modules\Pos\Traits\HasPos;
use Modules\Sale\Entities\Sale;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;
// use Spatie\Onboard\Concerns\GetsOnboarded;
// use Spatie\Onboard\Concerns\Onboardable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasCompany, HasPos, HasSubscriptions, HasSubscriptionPeriodUsage, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'is_active',
        'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_logged_in_at', 'created_at', 'updated_at', 'deleted_at'];

    protected $with = ['media'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/' . md5($this->attributes['email']));
    }

    public function scopeIsActive(Builder $builder) {
        return $builder->where('is_active', 1);
    }

    public function isEmployee(Builder $builder, User $employee) {
        return $builder->where($employee->getRoleNames(),'!=', 'Super Admin');
    }
    /**
     * Get the companies for the user.
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'user_id', 'id');
    }

    public function accounts()
    {
        return $this->hasMany(Account::class, 'user_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'seller_id', 'id');
    }

    public function pos_sales()
    {
        return $this->hasMany(PosSale::class, 'cashier_id', 'id');
    }

    public function hasMultipleCompanies()
    {
        return $this->companies()->count() > 1;
    }
}
