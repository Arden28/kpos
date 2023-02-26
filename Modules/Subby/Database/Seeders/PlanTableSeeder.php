<?php

namespace Modules\Subby\Database\Seeders;

use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanFeature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $plan = Plan::create([
                'id'    => 1,
                'tag' => 'monthly',
                'name' => 'mensuel',
                'description' => 'Pour les petites et moyennes entreprises.',
                'price' => 25000.00,
                'signup_fee' => 0.00,
                'invoice_period' => 1,
                'invoice_interval' => 'month',
                'trial_period' => 1,
                'trial_interval' => 'month',
                'grace_period' => 1,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'XAF',
            ]);
            $plan->save();

            // Create multiple plan features at once
            $plan->features()->saveMany([
                new PlanFeature(['tag' => 'pos', 'name' => 'POS disponible', 'value' => true]),
                new PlanFeature(['tag' => 'company_number', 'name' => '4 Entreprises disponibles', 'value' =>true]),
            ]);

            $plan_2 = Plan::create([
                'id'    => 2,
                'tag' => 'yearly',
                'name' => 'Annuel',
                'description' => 'For small and medium enterprises',
                'price' => 120000.00,
                'signup_fee' => 0.00,
                'invoice_period' => 1,
                'invoice_interval' => 'year',
                'trial_period' => 1,
                'trial_interval' => 'month',
                'grace_period' => 1,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'XAF',
            ]);
            $plan_2->save();

            // Create multiple plan features at once
            $plan_2->features()->saveMany([
                new PlanFeature(['tag' => 'pos', 'name' => 'POS disponible', 'value' => true]),
                new PlanFeature(['tag' => 'company_number', 'name' => '4 Entreprises disponibles', 'value' =>true]),
            ]);
        }

        // $this->call("OthersTableSeeder");

}
