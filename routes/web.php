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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/locations', function () {
    return view('locations');
});

Route::get('/get-key', 'KeyApiController@getKey');
Route::get('/places', function () {
    $faker = Faker\Factory::create();

    for ($i = 0; $i < 100; $i++){
        for ($j = 0; $j < 100; $j++){
            \App\Models\Place::create([
                'name' => $faker->city,
                'long' => $i,
                'lat' => $j
            ]);
        }
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
