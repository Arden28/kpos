<?php

namespace Modules\Elearning\Abstracts;

use Illuminate\Database\Eloquent\Model;


class School extends Model
{

    use HasFactory, Notifiable;


    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function users(){

        return $this->hasMany(User::class, 'id');
    }
}
