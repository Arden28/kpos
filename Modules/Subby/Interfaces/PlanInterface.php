<?php

namespace Modules\Subby\Interfaces;

interface PlanInterface
{
    public function getAllPlans();

    public function getPlanById($plan);
}
