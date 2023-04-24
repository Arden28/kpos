<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name' => 'Finances & Factures',
                'slug' => 'finance',
                'short_name'    =>  'Finance',
                'description'  =>  'Gérez plus efficacement vos finances.'
            ],
            [
                'name' => 'Inventaire',
                'slug' => 'inventory',
                'short_name'    =>  'Inventaire',
                'description'  =>  'Gérez plus efficacement vos stocks & approvisionnements.'
            ],
            [
                'name' => 'Personnel',
                'slug' => 'hr',
                'short_name'    =>  'Personnel',
                'description'  =>  'Gérez plus efficacement votre personnel.'
            ],
            [
                'name' => 'Ventes',
                'slug' => 'sales',
                'short_name'    =>  'Vente',
                'description'  =>  'Gérez plus efficacement vos ventes.'
            ],

            [
                'name' => 'Relation Clients/Fournisseurs',
                'slug' => 'crm',
                'short_name'    =>  'CRM',
                'description'  =>  'Gérez plus efficacement vos clients et fournisseurs.'
            ],

            [
                'name' => 'Point de Vente',
                'slug' => 'pos',
                'short_name'    =>  'PDV',
                'description'  =>  'Gérez votre magasin plus efficacement votre magasin.'
            ],
        ];

        foreach ($modules as $module) {
            Module::create($module);
            
        }

    }
}
