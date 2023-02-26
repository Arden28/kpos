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
            'company_name' => 'Marie Reine ',
            'company_email' => 'contact.mariereine@koverae.com',
            'company_phone' => '012345678901',
            'notification_email' => 'notification@koverae.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'footer_text' => 'Triangle Pos © 2021 || Developed by <strong><a target="_blank" href="https://fahimanzam.me">Fahim Anzam</a></strong>',
            'company_address' => 'Brazzaville, 725 Avenue de l OUA',
            'created_by'    =>1
        ]);
        $setting_1->save();

        $setting_2 = Setting::create([
            'company_id'   => 2,
            'company_name' => 'Harvest',
            'company_email' => 'contact.harvest@koverae.com',
            'company_phone' => '012345678901',
            'notification_email' => 'notification@koverae.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
            'footer_text' => 'Koverae © 2021 || Developed by <strong><a target="_blank" href="https://fahimanzam.me">Fahim Anzam</a></strong>',
            'company_address' => 'Brazzaville, 725 Avenue de l OUA',
            'created_by'    =>1
        ]);
        $setting_2->save();
    }
}
