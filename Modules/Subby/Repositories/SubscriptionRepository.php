<?php

namespace Modules\Subby\Repositories;

use App\Traits\CompanySession;
use App\Models\User;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Subby\Interfaces\SubscriptionInterface;

class SubscriptionRepository implements SubscriptionInterface
{
    use CompanySession;

}
