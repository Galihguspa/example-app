<?php

use Illuminate\Routing\Router;
use App\Models\wilayah\Kabupaten;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    
    $router->resource('sopir', SopirController::class);
    $router->resource('jeniskain', JeniskainController::class);
    $router->resource('kategori', KategoriController::class);    
    $router->resource('warna', WarnaController::class);
    $router->resource('produk', ProdukController::class);
    $router->resource('mobil', MobilController::class);

    $router->resource('partner', PartnerController::class);
    $router->get('/api/partner/kabupaten_select', 'Pendukung\ApiWilayahController@kabupaten_select');

    $router->resource('stock', StockController::class);       


});

