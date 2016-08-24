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

use \App\Product as P; //指定路徑並且取別名
//use Laravel\Socialite\Facades\Socialite;
//use Illuminate\Support\Facades\Input;

Route::get('/', "mycontroller@index");

Route::get('/contact_us', "mycontroller@contact_us");

Route::get('/login', "mycontroller@login");

Route::get('/logout', "mycontroller@logout");

Route::get('/products', "mycontroller@products");

Route::get('/products/detail/{id}', "mycontroller@products_detail");

Route::get('/products/brands', "mycontroller@brands");

Route::get('/blog', "mycontroller@blog");

Route::get('/blog/single', "mycontroller@blog_single");

Route::get('/blog/post/{id}', "mycontroller@blog_post");

Route::get('/search/{key_word}', "mycontroller@search");

Route::get('/cart', "mycontroller@cart");

Route::post('/cart', "mycontroller@cart");

Route::get('/cart/cart_clear','mycontroller@cart_clear');

//Route::post('/cart/add' ,"mycontroller@cart_add");

Route::get('/account', "mycontroller@checkout");


//用中間層檢查是否已登入,登入才能進 checkout 頁面，否則會到 login 頁面
Route::get('/checkout', ["middleware" => "auth" , "uses" => "mycontroller@checkout"]);

Route::post('/register', "mycontroller@register");

Route::post('/auth/login',"mycontroller@auth_login");

Route::get('/auth/logout',"mycontroller@auth_logout");

Route::get('/fb_redirect',"mycontroller@fb_redirect");

Route::get('/fb_callback',"mycontroller@fb_callback");



//
//Route::get('/fb_callback', function ($facebook = "facebook")
//{
//    $provider = Socialite::with($facebook);
//    if (Input::has('code'))
//    {
//        $user = $provider->user();
//        return var_dump($user);
//    } else {
//        return $provider->scopes(['public_profile','user_friends'])->redirect();
//    }
//});





Route::group([
    'prefix'    => 'allpay'],
    function () {
//        Route::get('/', 'mycontroller@index1');
        Route::get('/checkoutAllpay', 'mycontroller@checkoutAllpay');
    }
);

//
//
//Route::group([
////    'namespace' => 'namespace App\Http\Controllers',
//    'prefix'    => 'allpay_demo_201608'],
//    function () {
//        Route::get('/', 'mycontroller@index1');
//        Route::get('/checkoutAllpay', 'mycontroller@checkoutAllpay');
//    }
//);




////測試demo
//Route::group([
//    'namespace' => 'ScottChayaa\Allpay\Controllers',
//    'prefix'    => 'allpay_demo_201608'],
//    function () {
//        Route::get('/', 'DemoController@index1');
//        Route::get('/checkout', 'DemoController@checkout1');
//    }
//);





//=====================TEST================================
Route::get('/test/write',function (){

//      $product = new \App\Product();
//    $product->pro_name = "testhello~~~~~~~~";
//    $product->pro_title = "testhello~~~~";
//    $product->pro_detail = "testhello~~~~";
//    $product->pro_price = 1;
//    $product->cate_id = 1;
//    $product->brand_id = 1;
//    $product->created_at_ip = "testhello~~~~";
//    $product->updated_at_ip = "testhello~~~~";
//    $product->save();

    $product = new P();

    $product->create(["pro_name"=>"batch-asign5","pro_title"=>"batch_title"]); //以陣列的方式傳入資料庫,必須在Model做設定

//    //=============測試寫入其他table==============
//    $product = new \App\Product();
//    $product->create(["cate_name"=>"batch-asign5"]);
//    //==========================================
    
    
    return redirect('/test/read');
});

Route::get('/test/read',function (){
    $product = new \App\Product();

    $product_datas = $product->all();

    foreach ($product_datas as $product_data){
        echo "$product_data->id,$product_data->pro_name,$product_data->pro_title </br></br>";
    }

});

Route::get('/test/update/{id}',function ($id){

    $product = \App\Product::find($id); //find括號中找的是id值
    $product->pro_name = "更新測試2";
    $product->save();

    return redirect('/test/read');

});

Route::get('/test/delete/{id}',function ($id){

    $product = \App\Product::find($id);
    $product->delete();

    return redirect('/test/read');

});