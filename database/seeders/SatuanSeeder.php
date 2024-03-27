<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{

    /**
     * 
     * @var array
     */

    protected $data_satuan = [
        ["name"=>'Yards', "short"=>"Yrd"],
        ["name"=>'Meter', "short"=>"Mtr"],
        ["name"=>'Inches', "short"=>"Inch"],
        ["name"=>'Centimeter', "short"=>"Cm"],
        ["name"=>'Kilogram', "short"=>"Kg"],
        ["name"=>'Gram', "short"=>"g"],
        ["name"=>'Pcs', "short"=>"Pcs"],
        ["name"=>'Panel', "short"=>"Panel"],
        ["name"=>'Roll', "short"=>"Roll"],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data satuan dengan faker
        DB::table('satuan')->insert($this->data_satuan);
 
    }
}
