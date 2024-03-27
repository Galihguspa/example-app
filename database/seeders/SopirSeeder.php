<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sopir;

class SopirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         Sopir::factory(20)->create();
    }
}
