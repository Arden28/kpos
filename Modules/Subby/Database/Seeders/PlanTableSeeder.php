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
        $monthlyPlan1 = Plan::create([
            'tag' => 'standard',
            'name' => 'Standard',
            'description' => '5000 FCFA par mois',
            'price' => 5000,
                'signup_fee' => 0.00,
                'invoice_period' => 1,
                'invoice_interval' => 'month',
                'trial_period' => 15,
                'trial_interval' => 'day',
                'grace_period' => 1,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'XAF',
        ]);
        $monthlyPlan1->save();

        // Create multiple plan features at once
        $monthlyPlan1->features()->saveMany([
            new PlanFeature([

                    'tag' => 'company',
                    'name' => 'Company',
                    'description' => 'Ability to create one company',
                    'value' => true
                ]),

            new PlanFeature([
                'tag' => 'employees',
                'name' => 'Employee',
                'description' => 'Access for less than 5 employees',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'inventory',
                'name' => 'Inventory',
                'description' => 'Access to inventory module',
                'value' =>true
            ]),

        ]);


        $annualPlan1 = Plan::create([
            'tag' => 'standard annual',
            'name' => 'Standard',
            'description' => '42000 FCFA par an (3500 FCFA par mois)',
            'price' => 42000,
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
        $annualPlan1->save();

        // Create multiple plan features at once
        $annualPlan1->features()->saveMany([
            new PlanFeature([

                    'tag' => 'company',
                    'name' => 'Company',
                    'description' => 'Ability to create one company',
                    'value' => true
                ]),

            new PlanFeature([
                'tag' => 'employees',
                'name' => 'Employee',
                'description' => 'Access for less than 5 employees',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'inventory',
                'name' => 'Inventory',
                'description' => 'Access to inventory module',
                'value' =>true
            ]),

        ]);


        $monthlyPlan2 = Plan::create([
            'tag' => 'medium',
            'name' => 'Medium',
            'description' => '15000 FCFA par mois',
            'price' => 15000,
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
        $monthlyPlan2->save();

        // Create multiple plan features at once
        $monthlyPlan2->features()->saveMany([

            new PlanFeature([

                    'tag' => 'company',
                    'name' => 'Company',
                    'description' => 'Ability to create one company',
                    'value' => true
                ]),

            new PlanFeature([
                'tag' => 'employees',
                'name' => 'Employee',
                'description' => 'Access for less than 5 employees',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'inventory',
                'name' => 'Inventory',
                'description' => 'Access to inventory module',
                'value' =>true
            ]),

            new PlanFeature([

                    'tag' => 'sales',
                    'name' => 'Sales',
                    'description' => 'Ability to manage sales',
                    'value' => true
                ]),

            new PlanFeature([
                'tag' => 'customer_suppliers',
                'name' => 'Customer/Supplier',
                'description' => 'Ability to manage customers and suppliers',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'pos',
                'name' => 'POS',
                'description' => 'Access to the POS module',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'multi_store',
                'name' => 'Multi-Store',
                'description' => 'Ability to create multiple stores in the POS module',
                'value' =>true
            ]),

        ]);

        $annualPlan2 = Plan::create([
            'tag' => 'medium annual',
            'name' => 'Medium',
            'description' => '156000 FCFA par an (13000 FCFA par mois)',
            'price' => 156000,
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
        $annualPlan2->save();

        // Create multiple plan features at once
        $annualPlan2->features()->saveMany([

            new PlanFeature([

                    'tag' => 'company',
                    'name' => 'Company',
                    'description' => 'Ability to create one company',
                    'value' => true
                ]),

            new PlanFeature([
                'tag' => 'employees',
                'name' => 'Employee',
                'description' => 'Access for less than 5 employees',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'inventory',
                'name' => 'Inventory',
                'description' => 'Access to inventory module',
                'value' =>true
            ]),

            new PlanFeature([

                    'tag' => 'sales',
                    'name' => 'Sales',
                    'description' => 'Ability to manage sales',
                    'value' => true
                ]),

            new PlanFeature([
                'tag' => 'customer_suppliers',
                'name' => 'Customer/Supplier',
                'description' => 'Ability to manage customers and suppliers',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'pos',
                'name' => 'POS',
                'description' => 'Access to the POS module',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'multi_store',
                'name' => 'Multi-Store',
                'description' => 'Ability to create multiple stores in the POS module',
                'value' =>true
            ]),

        ]);


        $monthlyPlan3 = Plan::create([
            'tag' => 'enterprise',
            'name' => 'Enterprise',
            'description' => '45000 FCFA par mois',
            'price' => 45000,
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
        $monthlyPlan3->save();

        // Create multiple plan features at once
        $monthlyPlan3->features()->saveMany([

            // Plan 1 +
            new PlanFeature([

                'tag' => 'company',
                    'name' => 'Company',
                    'description' => 'Ability to create one company',
                    'value' => true
                ]),

            new PlanFeature([
                'tag' => 'employees',
                'name' => 'Employee',
                'description' => 'Access for less than 5 employees',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'inventory',
                'name' => 'Inventory',
                'description' => 'Access to inventory module',
                'value' =>true
            ]),

            // Plan 2 +
            new PlanFeature([

                    'tag' => 'sales',
                    'name' => 'Sales',
                    'description' => 'Ability to manage sales',
                    'value' => true
                ]),

            new PlanFeature([
                'tag' => 'customer_suppliers',
                'name' => 'Customer/Supplier',
                'description' => 'Ability to manage customers and suppliers',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'pos',
                'name' => 'POS',
                'description' => 'Access to the POS module',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'multi_store',
                'name' => 'Multi-Store',
                'description' => 'Ability to create multiple stores in the POS module',
                'value' =>true
            ]),

            // Plan 3 +

            new PlanFeature([
                'tag' => 'more_employees',
                'name' => 'More Employees',
                'description' => 'Access for 5 to 25 employees',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'more_companies',
                'name' => 'More Companies',
                'description' => 'Ability to create up to 3 companies',
                'value' =>true
            ]),

            new PlanFeature([
                'tag' => 'more_stores',
                'name' => 'More Stores',
                'description' => 'Ability to create up to 5 stores in the POS module',
                'value' =>true
            ]),


        ]);

        $annualPlan3 = Plan::create([
            'tag' => 'enterprise annual',
            'name' => 'Enterprise',
            'description' => '504000 FCFA par an (42000 FCFA par mois)',
            'price' => 504000,
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
        $annualPlan3->save();


            // $plan = Plan::create([
            //     'id'    => 1,
            //     'tag' => 'monthly',
            //     'name' => 'mensuel',
            //     'description' => 'Pour les petites et moyennes entreprises.',
            //     'price' => 25000.00,
            //     'signup_fee' => 0.00,
            //     'invoice_period' => 1,
            //     'invoice_interval' => 'month',
            //     'trial_period' => 1,
            //     'trial_interval' => 'month',
            //     'grace_period' => 1,
            //     'grace_interval' => 'day',
            //     'tier' => 1,
            //     'currency' => 'XAF',
            // ]);
            // $plan->save();

            // // Create multiple plan features at once
            // $plan->features()->saveMany([
            //     new PlanFeature(['tag' => 'pos', 'name' => 'POS disponible', 'value' => true]),
            //     new PlanFeature(['tag' => 'company_number', 'name' => '4 Entreprises disponibles', 'value' =>true]),
            // ]);

            // $plan_2 = Plan::create([
            //     'id'    => 2,
            //     'tag' => 'yearly',
            //     'name' => 'annual',
            //     'description' => 'For small and medium enterprises',
            //     'price' => 120000.00,
            //     'signup_fee' => 0.00,
            //     'invoice_period' => 1,
            //     'invoice_interval' => 'year',
            //     'trial_period' => 1,
            //     'trial_interval' => 'month',
            //     'grace_period' => 1,
            //     'grace_interval' => 'day',
            //     'tier' => 1,
            //     'currency' => 'XAF',
            // ]);
            // $plan_2->save();

            // // Create multiple plan features at once
            // $plan_2->features()->saveMany([
            //     new PlanFeature(['tag' => 'pos', 'name' => 'POS disponible', 'value' => true]),
            //     new PlanFeature(['tag' => 'company_number', 'name' => '4 Entreprises disponibles', 'value' =>true]),
            // ]);

        }

        // $this->call("OthersTableSeeder");

}
