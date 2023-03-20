<?php

namespace Modules\Pos\Interfaces;

interface PosInterface
{
    public function getAllPos($company);

    public function currentPos();
    public function createPhysicalPos($request, $company);

    public function createPos($request, $pos);

    public function editPos($request, $pos);
    // Session
    public function startNewSession($request);

    public function createPosSale($pos, $sale, $company, $cashier);
}
