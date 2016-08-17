<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use ShoppingCart;                   //use ShoppingCart
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class mycontroller extends Controller
{
    var $products;
    var $categories;
    var $brands;
    var $category1;

    public function __construct() //建構子，程式一開始就會自己執行
    {
        $this->products = Product::all(["id","pro_name","pro_price"]);
        $this->categories = Category::all(["cate_name"]); //Category 是Model的名稱
        $this->brands = Brand::all(["brand_name"]);
        $this->category1 = Category::all()->get(0); //顯示單筆資料get()中的數值是索引值

    }

    public function index()
    {
        //=======================查找mysql資料測試=====================
//        $pro_name = "上衣-45378911";
//        $result = DB::table('products')->select('pro_name')->where('pro_name', $pro_name)->first();
//        dd($result);
//        return $result->pro_name;
        //===========================================================


        return view("home",["title" => "Home", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function contact_us()
    {
        return view("contact_us",["title" => "Contact_Us", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function login()
    {
        return view("login",["title" => "Login", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function logout()
    {
        return "logout";
    }

    public function products()
    {
        return view("products",["title" => "Products", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function products_detail($id)
    {
        return view("products_detail_$id",["title" => "Products_Detail_$id", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function blog()
    {
        return view("blog",["title" => "Blog", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function blog_post($id)
    {
        return view("blog_single_$id",["title" => "Blog_Single_$id", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function blog_single()
    {
        return view("blog_single",["title" => "Blog_Single", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function search($key_word)
    {
        return "search $key_word";
    }

    public function cart()
    {
        return view("cart",["title" => "Cart", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function cart_add(Request $request)
    {
        $product_id = $request->get("product_id");
        $product = Product::find($product_id);

        ShoppingCart::add([
            "id" => $product->id,
            "name" => $product->pro_name,
            "qty" => 1,
            "price" => $product->pro_price,
        ]);

        $cart = ShoppingCart::content();

        return view("cart",["title" => "Cart","description" => "SOE 網頁搜尋優化的文章放這裡","cart" => $cart,]);
    }

    public function checkout()
    {
        return view("checkout",["title" => "Checkout", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands ,"category1" => $this->category1 ,"description" => "SOE 網頁搜尋優化的文章放這裡"]);
    }

    public function account()
    {
        return "account";
    }

}
