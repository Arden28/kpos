<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductFactory;
use Modules\Product\Notifications\NotifyQuantityAlert;
use Modules\Product\Traits\HasSupplier;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{

    use HasFactory, HasSupplier, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }



    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function unit() {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/fallback_product_image.png');
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    public function setProductCostAttribute($value) {
        $this->attributes['product_cost'] = ($value * 100);
    }

    public function getProductCostAttribute($value) {
        return ($value / 100);
    }

    public function setProductPriceAttribute($value) {
        $this->attributes['product_price'] = ($value * 100);
    }

    public function getProductPriceAttribute($value) {
        return ($value / 100);
    }
    /**
     * Get the company that owns the products categories.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }



    /**
     * Determine if the product is stockable
     *
     */
    public function scopeIsStorable(Builder $builder) {
        return $builder->where('product_type', 'storable');
    }

    /**
     * Determine if the product is consumable
     *
     */
    public function scopeIsConsumable(Builder $builder) {
        return $builder->where('product_type', 'consumable');
    }

    /**
     * Determine if the product is stockable
     *
     */
    public function scopeIsService(Builder $builder) {
        return $builder->where('product_type', 'service');
    }


    /**
     * Determine if the product can be sold
     *
     */
    public function scopeCanBeSold(Builder $builder) {
        return $builder->where('can_be_sold', 1);
    }


    /**
     * Determine if the product can be sold
     *
     */
    public function scopeCanBePurchased(Builder $builder) {
        return $builder->where('can_be_purchased', 1);
    }


    /**
     * Determine if the product can be sold
     *
     */
    public function scopeCanBeRented(Builder $builder) {
        return $builder->where('can_be_rented', 1);
    }

    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
