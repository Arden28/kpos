<?php

    namespace Modules\Inventory\Traits;

use Illuminate\Database\Eloquent\Builder;
use Modules\People\Entities\Supplier;

    trait HasSupplier{

        public function supplier() {
            return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
        }


    }
