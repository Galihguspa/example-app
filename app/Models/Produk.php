<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    /**
     * @var  string $primaryKey
     */
    protected $primaryKey = 'kode_produk';
    public $incrementing = false;


    public static function get_kode_produk()
    {   
        $char_kode = "MP";
        $result = DB::table('produk')
                ->select(DB::raw("mid(kode_produk,3,(length(kode_produk))-2) as nomor"))
                ->where(DB::raw("left(kode_produk,2) "), '=', $char_kode)
                ->orderByRaw("cast(mid(kode_produk,3,(length(kode_produk))-2) as unsigned) desc")
                ->limit(1)
                ->first();
        if (empty($result->nomor)) {
            $nomor = 1;
        }else{
            $nomor = (int) $result->nomor + 1;
        }
        $kode_produk_new = $char_kode."".$nomor;
                
        return $kode_produk_new;
    }
}
