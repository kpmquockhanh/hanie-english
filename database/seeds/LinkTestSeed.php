<?php

use Illuminate\Database\Seeder;

class LinkTestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ConfigTestLinks::query()->create([
           'label' => 'Starters',
           'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSe-EfpsHygsgc4a68ybut1FjO1Ra71PmmnGnNVOn9GA6KqKjg/viewform?fbclid=IwAR1Q2H-iJ1078J8dUCMQT5YVuPsY5reLTqyGVzC-nYM_fa188xpd-UL9Cks'
        ]);
        \App\ConfigTestLinks::query()->create([
            'label' => 'Movers',
            'link' => 'https://docs.google.com/forms/d/1sTOoourqCM2E8xK1Kb5hs43gVP7rBxukbXEoxeNOMSk/viewform?fbclid=IwAR1dc-BJ-iSD1NEnMhNYIE4iOzSgkbog3rurEsEg3phg94M7Ajx_ynbnLaQ&edit_requested=true'
        ]);
    }
}
