<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{

    /**
     * 
     * @var array
     * @var string
     */

    protected function data_kategori()
    { 
        $tanggal = date('Y-m-d H:i:s');
        return [
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_kategori"=>'Kain Greige'],
            ["created_at"=>$tanggal, "updated_at"=>$tanggal,"nama_kategori"=>'Kain Jadi'],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->truncate(); 
        DB::table('kategori')->insert($this->data_kategori());
 
    }
}
