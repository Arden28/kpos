<?php

namespace App\Models\Common;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\People\Entities\Customer;
use Modules\People\Entities\Supplier;
use Modules\Pos\Entities\PhysicalPos;
use Modules\Pos\Entities\Pos;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Purchase\Entities\Purchase;
use Modules\Sale\Entities\Sale;
use Modules\Setting\Entities\Setting;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
        use HasFactory, Notifiable, InteractsWithMedia;

        protected $table = 'companies';
        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        // protected $fillable = [
        //     'api_key',
        //     'company_name',
        //     'company_email',
        //     'company_phone',
        //     'created_by'
        // ];


        // protected $fillable = ['apiKey', 'company_name', 'company_email', 'created_by'];
        protected $guarded = [];

        protected $with = ['media'];

        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('avatars')
                ->useFallbackUrl('https://www.gravatar.com/avatar/' . md5($this->attributes['api_key']));
        }


        /**
         * Get the user that owns the company.
         */
        public function user()
        {
            return $this->belongsTo(User::class, 'created_by');
        }

        // Les paramètres de chaque company
        public function physicalPos()
        {
            return $this->hasMany(Pos::class, 'company_id', 'id');
        }

        // Les paramètres de chaque company
        public function setting()
        {
            return $this->hasOne(Setting::class, 'company_id', 'id');
        }
        /**
         * Get products categories for the user.
         */
        public function categories()
        {
            return $this->hasMany(Category::class, 'company_id', 'id');
        }

        /**
         * Get products categories for the user.
         */
        public function products()
        {
            return $this->hasMany(Product::class, 'company_id', 'id');
        }

        /**
         * Get products categories for the user.
         */
        public function sales()
        {
            return $this->hasMany(Sale::class, 'company_id', 'id');
        }

        /**
         * Get products categories for the user.
         */
        public function customers()
        {
            return $this->hasMany(Customer::class, 'company_id', 'id');
        }

        /**
         * Get products categories for the user.
         */
        public function suppliers()
        {
            return $this->hasMany(Supplier::class, 'company_id', 'id');
        }

        /**
         * Get products categories for the user.
         */
        public function purchases()
        {
            return $this->hasMany(Purchase::class, 'company_id', 'id');
        }
}
