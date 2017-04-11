<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }
}
