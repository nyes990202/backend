<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('font/index');
    }

    public function news()
    {
        return view('font/news');
    }

    public function news_info()
    {
        return view('font/news_info');
    }

    public function contact_us()
    {
        return view('font/contact_us');
    }
}
