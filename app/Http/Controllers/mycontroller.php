<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class mycontroller extends Controller
{
    var $products;
    var $categories;
    var $brands;

    public function __construct() //建構子，程式一開始就會自己執行
    {
        $this->products = Product::all(["id","pro_name","pro_price"]);
        $this->categories = Category::all(["cate_name"]);
        $this->brands = Brand::all(["brand_name"]);
    }

    public function index()
    {


        return view("home",["title" => "Home", "products" => $this->products,"categories" => $this->categories, "brands" => $this->brands]);
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
