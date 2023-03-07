<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\Setting;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting_1 = Setting::create([
            'company_id'   => 1,
            'notification_email' => 'notification@koverae.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'company_address' => 'Brazzaville, 725 Avenue de l OUA'
        ]);
        $setting_1->save();

        $setting_2 = Setting::create([
            'company_id'   => 2,
            'notification_email' => 'notification@koverae.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'company_address' => 'Brazzaville, 725 Avenue de l OUA'
        ]);
        $setting_2->save();
    }
}
