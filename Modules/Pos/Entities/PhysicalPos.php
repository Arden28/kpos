<?php

namespace Modules\Pos\Entities;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Database\factories\PhysicalPosFactory;

class PhysicalPos extends Model
{
    use HasFactory;

    protected $table = 'physical_pos';
    protected $fillable = ['name'];


    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    protected static function newFactory()
    {
        return PhysicalPosFactory::new();
    }
}
