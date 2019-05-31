<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::query()->create([
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => bcrypt('admin1234'),
        ]);
        \App\Admin::query()->create([
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => bcrypt('admin1234'),
        ]);

    }
}
