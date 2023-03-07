<?php

namespace Database\Seeders;

use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Arden BOUET',
            'email' => 'laudbouetoumoussa@koverae.com',
            'phone' => '+242064074926',
            'password' => Hash::make('koverae'),
            'is_active' => 1,
            'current_company_id' => 1,
        ]);

        $superAdmin = 'Super Admin';

        $user->assignRole($superAdmin);

        $plan = Plan::find(2);

        // $user->newSubscription(
        //     'main', // identifier tag of the subscription. If your application offers a single subscription, you might call this 'main' or 'primary'
        //     $plan, // Plan or PlanCombination instance your subscriber is subscribing to
        //     'Koverae Prime', // Human-readable name for your subscription
        //     'For small and medium enterprises', // Description
        //     null, // Start date for the subscription, defaults to now()
        //     'free' // Payment method service defined in config
        // );

        // $user->isSubscribedTo($plan);
    }
}
