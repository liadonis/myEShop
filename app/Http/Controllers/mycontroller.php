<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class mycontroller extends Controller
{
    public function index()
    {
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

    public function products_category()
    {
        return view("products_category",["title" => "Products_Category"]);
    }

    public function blog()
    {
        return view("blog",["title" => "Blog"]);
    }

    public function blog_post($id)
    {
        return "blog_post $id";
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
