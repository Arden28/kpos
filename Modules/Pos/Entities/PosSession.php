<?php

namespace Modules\Pos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Database\factories\PosSessionFactory;

class PosSession extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return PosSessionFactory::new();
    }
}
