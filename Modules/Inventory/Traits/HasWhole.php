<?php

    namespace Modules\Inventory\Traits;

    use Illuminate\Database\Eloquent\Builder;
    use Modules\People\Entities\Supplier;

    trait HasWhole{

        public function isWhole(Builder $builder) {
            return $builder->where('is_wholesale', 1);
        }


    }
