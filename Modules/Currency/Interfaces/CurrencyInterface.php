<?php

namespace Modules\Currency\Interfaces;

interface CurrencyInterface
{

    public function getCurrencies($company);
    public function create($request);

    public function edit($request, $currency);
}
