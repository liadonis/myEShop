<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class mycontroller extends Controller
{
    public function index()
    {
//        $product = new \App\Product();
//        $product->pro_name = "testHello~~"; //因為建立資料表的時候pro_name設定為unique 所以名稱重複會出錯
//        $product->save();


        return view("home",["title" => "Home"]);
    }

    public function contact_us()
    {
        return view("contact_us",["title" => "Contact_Us"]);
    }

    public function login()
    {
        return view("login",["title" => "Login"]);
    }

    public function logout()
    {
        return "logout";
    }

    public function products()
    {
        return view("products",["title" => "Products"]);
    }

    public function products_detail($id)
    {
        return view("products_detail_$id",["title" => "Products_Detail_$id"]);
    }

    public function blog()
    {
        return view("blog",["title" => "Blog"]);
    }

    public function blog_post($id)
    {
        return view("blog_single_$id",["title" => "Blog_Single_$id"]);
    }

    public function blog_single()
    {
        return view("blog_single",["title" => "Blog_Single"]);
    }

    public function search($key_word)
    {
        return "search $key_word";
    }

    public function cart()
    {
        return view("cart",["title" => "Cart"]);
    }

    public function checkout()
    {
        return view("checkout",["title" => "Checkout"]);
    }

    public function account()
    {
        return "account";
    }

}
