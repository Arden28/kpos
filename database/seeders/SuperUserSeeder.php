<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
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
        $code = Uuid::uuid4();

        $team = Team::create([
            'uuid' => $code,
        ]);

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

        // Update user's team
        $user->team_id = $team->id;
        $user->save();

        // Update user_id's team
        $team->user_id = $user->id;
        $team->save();

        // $plan = Plan::find(1);

        // $team->newSubscription(
        //     'main', // identifier tag of the subscription. If your application offers a single subscription, you might call this 'main' or 'primary'
        //     $plan, // Plan or PlanCombination instance your subscriber is subscribing to
        //     $plan->name, // Human-readable name for your subscription
        //     $plan->description, // Description
        //     null, // Start date for the subscription, defaults to now()
        //     // 'free' // Payment method service defined in config
        // );

    }
}
