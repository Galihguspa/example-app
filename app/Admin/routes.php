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
    // $router->get('/warna', 'WarnaController@index')->name('warna');
    // $router->get('/warna/create', 'WarnaController@add');
    // $router->post('/warna/create', 'WarnaController@store');
    // $router->get('/warna/loadJson', 'WarnaController@loadJson');

    $router->resource('sopir', SopirController::class);
    $router->resource('jeniskain', JeniskainController::class);
    $router->resource('kategori', KategoriController::class);
    
    $router->resource('warna', WarnaController::class);

    // $router->resource('partner', PartnerController::class);
    $router->get('/partner', 'PartnerController@index')->name('partner');
    $router->post('/partner', 'PartnerController@store')->name('partner.store');
    $router->get('/partner/create', 'PartnerController@create')->name('partner.create');
    $router->get('/partner/{partner}/edit', 'PartnerController@edit')->name('partner.edit');
    $router->put('/partner/{partner}', 'PartnerController@update')->name('partner.update');
    $router->delete('/partner/{partner}', 'PartnerController@destroy')->name('partner.destroy');
    $router->get('/partner/kabupaten_select', 'PartnerController@kabupaten_select');

    // $router->get('/partner/kabupaten_select', 'PartnerController@kabupaten_select');


    $router->resource('produk', ProdukController::class);
    $router->resource('mobil', MobilController::class);

   

});

