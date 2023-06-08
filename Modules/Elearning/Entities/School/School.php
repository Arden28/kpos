<?php

namespace Modules\Elearning\Entities\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Modules\Elearning\School as SchoolModel;

class School extends SchoolModel
{

    protected $table ='schools';

    protected $fillable = ['company_id', 'name', 'short_name', 'about', 'medium', 'code'];



    // protected static function newFactory()
    // {
    //     return \Modules\Elearning\Database\factories\School/SchoolFactory::new();
    // }
}
