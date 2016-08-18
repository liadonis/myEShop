<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;  //use ShoppingCart
//use Illuminate\Http\Request;
use Request;  //此種靜態方法在這個頁面都呼叫的到
use Illuminate\Support\Facades\Redirect;  //use ShoppingCart
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class mycontroller extends Controller
{
    var $products;
    var $categories;
    var $brands;
    var $category1;
    var $cartItemTotal;

    public function __construct() //建構子，程式一開始就會自己執行
    {
        $this->products = Product::all(["id","pro_name","pro_price"]);
        $this->categories = Category::all(["cate_name"]); //Category 是Model的名稱
        $this->brands = Brand::all(["brand_name"]);
        $this->category1 = Category::all()->get(0); //顯示單筆資料get()中的數值是索引值
        $this->cartItemTotal = Cart::content()->count();

    }

    public function index()
    {
        //=======================查找mysql資料測試=====================
//        $pro_name = "上衣-45378911";
//        $result = DB::table('products')->select('pro_name')->where('pro_name', $pro_name)->first();
//        dd($result);
//        return $result->pro_name;
        //===========================================================


        return view("home",["title" => "Home", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function contact_us()
    {
        return view("contact_us",["title" => "Contact_Us", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function login()
    {
        return view("login",["title" => "Login", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function logout()
    {
        return "logout";
    }

    public function products()
    {
        return view("products",["title" => "Products", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function products_detail($id)
    {
        return view("products_detail_$id",["title" => "Products_Detail_$id", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function blog()
    {
        return view("blog",["title" => "Blog", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function blog_post($id)
    {
        return view("blog_single_$id",["title" => "Blog_Single_$id", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function blog_single()
    {
        return view("blog_single",["title" => "Blog_Single", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function search($key_word)
    {
        return "search $key_word";
    }

    //使用 post 到 /cart 的程式碼
    public function cart(Request $request)
    {
//        //update/ add new item to cart   使用use Illuminate\Http\Request; 要用這邊的程式
//        if ($request->isMethod('post')) {
//            $product_id = $request->get('product_id');
//            $product = Product::find($product_id);
//            Cart::add(['id' => $product_id, 'name' => $product->pro_name, 'qty' => 1, 'price' => $product->pro_price]);
//        }

        if (Request::isMethod('post')){
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(['id' => $product_id, 'name' => $product->pro_name, 'qty' => 1, 'price' => $product->pro_price]);
        }
        //官網  https://packagist.org/packages/gloudemans/shoppingcart
        //執行商品數量增加
        if (Request::get('product_id') && Request::get('add') == 1 ){
            $items = Cart::Search(function ($cartItem,$rowId){ return $cartItem->id == Request::get("product_id"); });
            Cart::update($items->first()->rowId,$items->first()->qty +1);//使用集合的方式撈資料

            return Redirect::to("cart");//加上這一行，執行後網頁標題列才不會出現  cart?product_id=1&amp;add=1
        }

        //執行商品數量減少
        if (Request::get('product_id') && Request::get('minus') == 1 ){
            $items = Cart::Search(function ($cartItem,$rowId){ return $cartItem->id == Request::get("product_id"); });
            Cart::update($items->first()->rowId,$items->first()->qty -1);

            return Redirect::to("cart");
        }

        //執行單項商品刪除
        if (Request::get('product_id') && Request::get('clear') == 1 ){
            $items = Cart::Search(function ($cartItem,$rowId){ return $cartItem->id == Request::get("product_id"); });
            Cart::remove($items->first()->rowId);

            return Redirect::to("cart");
        }

        $cart = Cart::content();
        $cartItemTotal = Cart::content()->count(); //因為使用建構子會有延遲讀取的情況所以在cart方法中讀取自己的 $cartItemTotal



        return view("cart",["title" => "Cart","cart" => $cart,"cartItemTotal" => $cartItemTotal, "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function cart_clear()
    {
        Cart::destroy();

        return Redirect::to('cart');
    }


//    public function cart(Request $request) //方法2.使用靜態方法要加上Request $request
//    {
//        //方法1.
////        //當cart_add()將變數丟過來要對flush作判斷，並賦值否則會找不到值
////        if (session()->has('cart_from_server')){
////            $cart = session('cart_from_server');
////        }
//
//        //方法2.使用靜態方法呼叫Cart
//
//        $cart =  Cart::content();
//
//
//        return view("cart",["title" => "Cart","cart" => $cart,"cartItemTotal" => $this->cartItemTotal, "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
//    }
//
//    public function cart_add(Request $request)
//    {
//        $product_id = $request->get("product_id");
//        $product = Product::find($product_id);
//
//        Cart::add([
//            "id" => $product->id,
//            "name" => $product->pro_name,
//            "qty" => 1,
//            "price" => $product->pro_price,
//        ]);
//
////                              //方法1. "cart_from_server" => $cart 這裡的命名不可以相同否則系統會視作每次點入都是獨立的，不會將購物車作累加
////        return Redirect::to("cart")->with(["cart_from_server" => $cart,,"title" => "Cart","description" => "SOE 網頁搜尋優化的文章放這裡" ]);
//
//        //方法2.使用靜態方法呼叫Cart
//        return Redirect::to("cart")->with(["title" => "Cart","description" => "SOE 網頁搜尋優化的文章放這裡" ]);
//
//    }

    public function checkout()
    {
        return view("checkout",["title" => "Checkout", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡","cartItemTotal" => $this->cartItemTotal]);
    }

    public function account()
    {
        return "account";
    }

}
