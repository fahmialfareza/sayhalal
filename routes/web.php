<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Home */
Route::get('/', function () {
    return redirect('login');
});

// Clear Cache
Route::get('/clear-cache', function() {
    $exitCode1 = Artisan::call('cache:clear');
    $exitCode2 = Artisan::call('config:clear');
    $exitCode3 = Artisan::call('view:clear');
    $exitCode4 = Artisan::call('route:clear');
    // return what you want
    print_r($exitCode1);
});

/* Place */
Route::get('/provinces/{id}', 'AddressController@provinces');
Route::get('/regencies/{id}', 'AddressController@regencies');
Route::get('/districts/{id}', 'AddressController@districts');
Route::get('/villages/{id}', 'AddressController@villages');

Route::get('/instagram/feed', [
    'name' => 'Instagram Feed',
    'as' => 'app.instagram.feed',
    'uses' => 'InstagramController@feed',
]);

/* Login */
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes(['verify' => true]);
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admins.index');
    Route::get('tentang', "AdminController@tentang")->name('admins.tentang');
    // YouTube
    Route::get('youtube', 'AdminController@youtube')->name('admins.youtube');
    Route::post('youtube', 'AdminController@youtube_post')->name('admins.youtube_post');
    // Galeri
    Route::get('galeri', 'AdminController@galeri')->name('admins.galeri');
    Route::post('galeri', 'AdminController@galeri_post')->name('admins.galeri_post');
    // Info
    Route::get('info', 'AdminController@info')->name('admins.info');
    Route::post('info', 'AdminController@info_post')->name('admins.info_post');
    Route::delete('info/{id}', 'AdminController@info_hapus')->name('admins.info_hapus');
    // Instrumen
    Route::get('lph', 'AdminController@lph')->name('admins.lph');
    Route::get('halal_center', 'AdminController@halal_center')->name('admins.halal_center');
    Route::get('auditor_halal', 'AdminController@auditor_halal')->name('admins.auditor_halal');
    Route::get('penyelia_halal', 'AdminController@penyelia_halal')->name('admins.penyelia_halal');
    Route::get('manager_halal', 'AdminController@manager_halal')->name('admins.manager_halal');
    Route::get('juleha', 'AdminController@juleha')->name('admins.juleha');
    Route::get('pelaku_usaha', 'AdminController@pelaku_usaha')->name('admins.pelaku_usaha');
});

Route::group(['middleware' => ['user'], 'prefix' => 'user'], function() {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('tentang', "UserController@tentang")->name('users.tentang');
    /* Lembaga */
    // LPH
    Route::get('lph', 'UserController@lph')->name('users.lph');
    Route::post('lph', 'UserController@lph_store')->name('users.lph_store');
    Route::put('lph/{id}', 'UserController@lph_update')->name('users.lph_update');
    // Halal Center
    Route::get('halal_center', 'UserController@halal_center')->name('users.halal_center');
    Route::post('halal_center', 'UserController@halal_center_store')->name('users.halal_center_store');
    Route::put('halal_center/{id}', 'UserController@halal_center_update')->name('users.halal_center_update');
    /* Perorangan */
    Route::get('auditor_halal', 'UserController@auditor_halal')->name('users.auditor_halal');
    Route::post('auditor_halal', 'UserController@auditor_halal_store')->name('users.auditor_halal_store');
    Route::put('auditor_halal/{id}', 'UserController@auditor_halal_update')->name('users.auditor_halal_update');
    Route::get('penyelia_halal', 'UserController@penyelia_halal')->name('users.penyelia_halal');
    Route::post('penyelia_halal', 'UserController@penyelia_halal_store')->name('users.penyelia_halal_store');
    Route::put('penyelia_halal/{id}', 'UserController@penyelia_halal_update')->name('users.penyelia_halal_update');
    Route::get('manager_halal', 'UserController@manager_halal')->name('users.manager_halal');
    Route::post('manager_halal', 'UserController@manager_halal_store')->name('users.manager_halal_store');
    Route::put('manager_halal/{id}', 'UserController@manager_halal_update')->name('users.manager_halal_update');
    Route::get('juleha', 'UserController@juleha')->name('users.juleha');
    Route::post('juleha', 'UserController@juleha_store')->name('users.juleha_store');
    Route::put('juleha/{id}', 'UserController@juleha_update')->name('users.juleha_update');
    /* Pelaku Usaha */
    Route::get('pelaku_usaha', 'UserController@pelaku_usaha')->name('users.pelaku_usaha');
    Route::post('pelaku_usaha', 'UserController@pelaku_usaha_store')->name('users.pelaku_usaha_store');
    Route::put('pelaku_usaha/{id}', 'UserController@pelaku_usaha_update')->name('users.pelaku_usaha_update');
    Route::post('perusahaan', 'UserController@perusahaan_store')->name('users.perusahaan_store');
    Route::put('perusahaan/{id}', 'UserController@perusahaan_update')->name('users.perusahaan_update');
    Route::post('produk', 'UserController@produk_store')->name('users.produk_store');
    Route::delete('produk/{id}', 'UserController@produk_hapus')->name('users.produk_hapus');
    Route::post('restoran', 'UserController@restoran_store')->name('users.restoran_store');
    Route::delete('restoran/{id}', 'UserController@restoran_hapus')->name('users.restoran_hapus');
});
