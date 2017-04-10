<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function page($url)
    {
        
    }
}
