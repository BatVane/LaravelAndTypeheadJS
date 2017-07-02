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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/main-search-autocomplete', function(){
    return json_encode(DB::table('products')->get()->all());
});

Route::post('/main-search', function(Illuminate\Http\Request $request){
    return json_encode(DB::table('products')->where('productName', 'LIKE', '%'.$request->get('top-search').'%')->get()->all());
});

Route::get('/products/{productCode}', function($productCode){
    return json_encode(DB::table('products')->where('productCode', '=', $productCode)->get()->all());
});
