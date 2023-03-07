<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $company_1 = Company::create([
            'name' => 'Banéo',
            'user_id' => 1,
            'personal_company'  => true
        ]);
        $company_1->save();

        $company_2 = Company::create([
            'name' => 'Harvest',
            'user_id' => 1,
            'personal_company'  => true
        ]);
        $company_2->save();

    }
}
