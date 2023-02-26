<?php

namespace App\Repositories;

use App\Interfaces\CompanyInterface;
use App\Models\Common\Company;

class CompanyRepository implements CompanyInterface {

    public function getLatestCompany() {
        $company = Company::where('created_by', auth()->user()->id)->latest()->first();
        if($company){
            return $company;
        } else {
            return (object) ['id' => 0];
        }
    }
}
