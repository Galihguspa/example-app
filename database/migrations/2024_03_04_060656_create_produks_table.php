<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            // $table->integer('id');
            $table->string('kode_produk')->unique();
            $table->primary('kode_produk');
            $table->timestamps();
            $table->string('nama_produk');
            $table->string('lebar')->nullable();
            $table->string('satuan_lebar')->nullable();
            $table->string('satuan1');
            $table->string('satuan2')->nullable();
            // $table->integer('id_kategori')->nullable();
            // $table->integer('id_jenis_kain');
            $table->unsignedInteger('id_kategori');
            $table->unsignedInteger('id_jenis_kain');
            $table->enum('status_aktif',[0,1])->default(1);
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
