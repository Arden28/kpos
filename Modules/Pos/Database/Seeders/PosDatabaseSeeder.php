<?php

namespace Modules\Pos\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Entities\PosSale;

class PosDatabaseSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $pos1 = Pos::create([
            'name'      => 'Marie Reine Makelekele',
            'company_id'         => 1,
        ]);
        $pos1->save();

        $pos2 = Pos::create([
            'name'      => 'Banéo Moungali 2',
            'company_id'         => 1,
        ]);
        $pos2->save();


    }
}
