<?php

namespace Modules\Pos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Database\factories\PosSaleFactory;
use Modules\Sale\Entities\Sale;

class PosSale extends Model
{
    use HasFactory;

    protected $table = 'pos_sales';

    protected $fillable = ['pos_id', 'sale_id', 'company_id'];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function pos() {
        return $this->belongsTo(Pos::class);
    }

    public function sale() {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }
    protected static function newFactory()
    {
        return PosSaleFactory::new();
    }
}
