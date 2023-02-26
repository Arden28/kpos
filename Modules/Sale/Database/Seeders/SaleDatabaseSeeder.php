<?php

namespace Modules\Sale\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Pos\Entities\PosSale;
use Modules\Sale\Entities\Sale;

class SaleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Sale::factory()->count(50)->create();
        PosSale::factory()->count(20)->create();
        // $this->call("OthersTableSeeder");
    }
}
