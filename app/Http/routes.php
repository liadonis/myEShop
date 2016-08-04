<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', "mycontroller@index");

Route::get('/contact_us', "mycontroller@contact_us");

Route::get('/login', "mycontroller@login");

Route::get('/logout', "mycontroller@logout");

Route::get('/products', "mycontroller@products");

Route::get('/products/category', "mycontroller@products_category");

Route::get('/products/brands', "mycontroller@brands");

Route::get('/blog', "mycontroller@blog");

Route::get('/blog/post/{id}', "mycontroller@blog_post");

Route::get('/search/{key_word}', "mycontroller@search");

Route::get('/cart', "mycontroller@cart");

Route::get('/checkout', "mycontroller@checkout");

Route::get('/account', "mycontroller@checkout");