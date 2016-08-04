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
        return "contact_us";
    }

    public function login()
    {
        return "login";
    }

    public function logout()
    {
        return "logout";
    }

    public function products()
    {
        return "products";
    }

    public function products_category()
    {
        return "products_category";
    }

    public function blog()
    {
        return "blog";
    }

    public function blog_post($id)
    {
        return "blog_post $id";
    }

    public function search($key_word)
    {
        return "search $key_word";
    }

    public function cart()
    {
        return "cart";
    }

    public function checkout()
    {
        return "checkout";
    }
}