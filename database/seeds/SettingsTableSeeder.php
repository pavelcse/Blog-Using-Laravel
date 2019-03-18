<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'         => "BackBencher's Blog Using Laravel", 
            'contact_number'    => '+880 1619 896582', 
            'contact_email'     => 'info@backbencher.org', 
            'address'           => 'Mohakhali DOHS, Dhaka'
        ]);
    }
}
