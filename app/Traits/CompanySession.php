<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CompanySession {
    /**
     * @param string $request
     *
     * @return string
    */
    public function getCompanyCurrentSession() {
        $current_company_id = 0;

        if (session()->has('browse_company_id')){
            $current_company_id = Auth::user()->currentCompany->id;
        } else {
            $latest_company = $this->companyRepository->getLatestCompany();

            if($latest_company){
                $current_company_id = $latest_company->id;
            }
        }

        return $current_company_id;
    }
}
