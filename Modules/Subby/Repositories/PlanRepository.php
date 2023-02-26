<?php

namespace Modules\Subby\Repositories;

use App\Traits\CompanySession;
use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Subby\Interfaces\PlanInterface;
use Modules\Subby\Interfaces\SubscriptionInterface;

class PlanRepository implements PlanInterface
{
    use CompanySession;

    public function getAllPlans(){
        return Plan::all();
    }

    public function getPlanById($plan){

        return Plan::find($plan);
    }

    public function getPlanByTag($tag){

        return Plan::getByTag($tag);
    }
}
