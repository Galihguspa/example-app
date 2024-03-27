<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warna;

class WarnaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Warna::factory(20)->create();
    }
}
