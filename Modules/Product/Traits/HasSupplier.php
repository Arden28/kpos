<?php

    namespace Modules\Product\Traits;

use Illuminate\Database\Eloquent\Builder;
use Modules\People\Entities\Supplier;

    trait HasSupplier{

        public function supplier() {
            return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
        }


    }
