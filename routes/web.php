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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('add', 'mange@addarticle')->name('add');;
Route::post('add', 'mange@addarticle')->name('add');;
Route::get('show', 'mange@show');
Route::get('/read/{id}', 'mange@read');
Route::post('/read/{id}', 'mange@read');
/////////////////// about and contact

Route::get('/about', 'productcontroller@about');
Route::get('/contactus', 'productcontroller@contact');


////////////////////////// products

Route::get('products','productcontroller@showallproduct');
Route::get('products/{id}','productcontroller@showacatgoriesproducts');
Route::get('create','productcontroller@createproduct');
Route::post('products','productcontroller@storeproduct');
Route::post('/search','productcontroller@search');

///////////////////////////////catgories

Route::get('createcats','Catgorycontroller@createcatgories');
Route::post('catgory','Catgorycontroller@addcatgory') ;


////////////////////////////////////////  shopping cart


Route::get('cart/{id}','productcontroller@addtocart');
Route::get('cart','productcontroller@showcart');
Route::delete('cart/{id}','productcontroller@deleteproductfromcart');


//////////////////////////// admin

Route::get('admin','admincontroller@adminpage');
Route::get('allproducts','admincontroller@displayproduct');

Route::get('allcatgories','admincontroller@displaycatgory');
/////////////////////////////////////////////
Route::get('editproduct/{id}','admincontroller@editproduct');
Route::post('upadteproduct/{id}','admincontroller@upadteproduct');
Route::delete('products/{id}','admincontroller@deleteproduct');

////////////////////////////


Route::get('editcatgory/{id}','admincontroller@editcatgory');
Route::post('upadtecatgory/{id}','admincontroller@upadtecatgory');
Route::delete('delecatgory/{id}','admincontroller@deletecatgory');

/////////////////////////// paypal

Route::get('pay/with/paypal/{id}','productcontroller@paynow');
//Route::get('pay/with/allpaypal/{id}','productcontroller@paynowall');
Route::get('done/paypal','productcontroller@done');
Route::get('cansel/paypal','productcontroller@cansel');
Route::get('finaelly','productcontroller@myfinaelly');


///////


