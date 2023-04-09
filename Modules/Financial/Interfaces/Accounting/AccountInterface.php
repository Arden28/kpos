<?php

namespace Modules\Financial\Interfaces\Accounting;

interface AccountInterface
{
    public function getCompanyAccounts($company);

    public function createAccount($request, $company);

    public function addInAccountBook($request, $account_id, $company);

}
