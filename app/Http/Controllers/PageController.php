<?php

namespace App\Http\Controllers;

use App\Page;
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
        $page = Page::findByUrl($url);
        if(!$page) {
            return abort(404);
        }
        return view('page.show')->with([
            'page' => $page
        ]);
    }
}
