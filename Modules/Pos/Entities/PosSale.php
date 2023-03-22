<?php

namespace Modules\Pos\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Database\factories\PosSaleFactory;
use Modules\Sale\Entities\Sale;

class PosSale extends Model
{
    use HasFactory;

    protected $table = 'pos_sales';

    protected $fillable = ['pos_id', 'sale_id', 'company_id', 'cashier_id'];

    protected $with = ['sale'];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function pos() {
        return $this->belongsTo(Pos::class);
    }


    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id', 'id');
    }
    public function sale() {
        return $this->belongsTo(Sale::class);
    }
    protected static function newFactory()
    {
        return PosSaleFactory::new();
    }
}
