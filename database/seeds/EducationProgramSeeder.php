<?php

use App\EducationProgram;
use Illuminate\Database\Seeder;


class EducationProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EducationProgram::class, 5)->create();
    }
}
