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
        $admin = \App\Admin::query()->create([
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => bcrypt('admin1234'),
        ]);
        \App\User::query()->create([
            'username' => 'admin',
            'name' => 'Administrator',
            'created_by' => $admin,
            'password' => bcrypt('admin1234'),
        ]);


    }
}
