<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Currency\Database\Seeders\CurrencyDatabaseSeeder;
use Modules\Pos\Database\Seeders\PhysicalPosTableSeeder;
use Modules\Pos\Database\Seeders\PosDatabaseSeeder;
use Modules\Product\Database\Seeders\ProductDatabaseSeeder;
use Modules\Sale\Database\Seeders\SaleDatabaseSeeder;
use Modules\Setting\Database\Seeders\SettingDatabaseSeeder;
use Modules\Subby\Database\Seeders\PlanFeatureTableSeeder;
use Modules\Subby\Database\Seeders\PlanTableSeeder;
use Modules\User\Database\Seeders\PermissionsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlanTableSeeder::class);
        // $this->call(PlanFeatureTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(SuperUserSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(CurrencyDatabaseSeeder::class);
        $this->call(SettingDatabaseSeeder::class);
        // $this->call(PosDatabaseSeeder::class);
        $this->call(ProductDatabaseSeeder::class);
        // $this->call(SaleDatabaseSeeder::class);

    }
}
