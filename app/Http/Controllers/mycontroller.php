<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class mycontroller extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function contact_us()
    {
        return view("contact_us");
    }

    public function login()
    {
        return view("login");
    }

    public function logout()
    {
        return "logout";
    }

    public function products()
    {
        return view("product");
    }

    public function products_category()
    {
        return view("products_category");
    }

    public function blog()
    {
        return view("blog");
    }

    public function blog_post($id)
    {
        return "blog_post $id";
    }

    public function blog_single()
    {
        return view("blog_single");
    }

    public function search($key_word)
    {
        return "search $key_word";
    }

    public function cart()
    {
        return view("cart");
    }

    public function checkout()
    {
        return view("checkout");
    }

    public function account()
    {
        return "account";
    }

}
