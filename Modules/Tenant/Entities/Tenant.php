<?php

namespace Modules\Tenant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    protected $connection = 'mysql2';

    use HasFactory;

    protected $fillable = [''];

    protected static function newFactory()
    {
        return \Modules\Tenant\Database\factories\TenantFactory::new();
    }
}
