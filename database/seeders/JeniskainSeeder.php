<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JeniskainSeeder extends Seeder
{

    /**
     * 
     * @var array
     * @var string
     */

    protected function data_jenis_kain()
    { 
        $tanggal = date('Y-m-d H:i:s');
        return [
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_jenis_kain"=>'Alvaro Knit'],
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_jenis_kain"=>'Bbabat W276'],
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_jenis_kain"=>'Baby Knit'],
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_jenis_kain"=>'Baby Tery'],
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_jenis_kain"=>'Bubble'],
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_jenis_kain"=>'Canon Skin'],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jeniskain')->truncate(); 
        DB::table('jeniskain')->insert($this->data_jenis_kain());
 
    }
}
