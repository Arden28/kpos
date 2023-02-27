<?php

namespace App\Listeners\Common\Company;

use App\Models\Common\Company;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Setting\Entities\Setting;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class Created
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $api_key = Uuid::uuid4();

        $request = request();

        $company = Company::create([
            'api_key' => $api_key,
            'domain' => $request->domain,
            'created_by' => $event->user->id
        ]);

        $company->save();


        $settings = Setting::create([
            'company_id' => $company->id,
            'company_name' => $request->company_name,
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'created_by' => $event->user->id
        ]);
        $settings->save();


    }
}
