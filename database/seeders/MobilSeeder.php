<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobilSeeder extends Seeder
{
    
    /**
     * 
     * @var array
     * @var string
     */

    protected function data_mobil()
    { 
        $tanggal = date('Y-m-d H:i:s');
        return [
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_mobil"=>'Truk Hino ', "plat_nomor"=>"D 1111 XX"],
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_mobil"=>'Grand Max ', "plat_nomor"=>"D 2222 RS"],
        ];
    }
    
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('mobil')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('mobil')->insert($this->data_mobil());
    }
}
