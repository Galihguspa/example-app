<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('move_date');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('lot',50);
            $table->double('qty',14,2)->default(0.00);
            $table->string('satuan1',35);
            $table->double('qty2',14,2)->nullable();
            $table->string('satuan2',10)->nullable();
            $table->string('lokasi',10);
            $table->string('lokasi_rak',10)->nullable();
            $table->string('gramasi',35)->nullable();
            $table->string('finishing',35)->nullable();
            $table->string('lebar_jadi',35)->nullable();
            $table->string('satuan_lebar_jadi',35)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
