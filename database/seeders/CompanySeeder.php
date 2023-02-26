<?php

namespace Database\Seeders;

use App\Models\Common\Company;
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

        $api_key = Uuid::uuid4();

        $company_1 = Company::create([
            'api_key' => $api_key,
            'created_by' => 1,
        ]);
        $company_1->save();

        $api_key_2 = Uuid::uuid4();

        $company_2 = Company::create([
            'api_key' => $api_key_2,
            'created_by' => 1,
        ]);
        $company_2->save();
    }
}
