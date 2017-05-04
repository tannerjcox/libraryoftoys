<?php

namespace App\Http\Controllers;

use App\Page;
use App\Product;
use Illuminate\Support\Facades\Input;

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
        if (!$page) return abort(404);

        return view('page.show')->with([
            'page' => $page
        ]);
    }

    public function product($name, $id)
    {
        $product = Product::find($id);
        $preview = Input::get('preview');
        if (!$preview && (!$product || !$product->isAvailable())) {
            return abort(404);
        }

        return view('view-product')->with([
            'product' => $product,
            'preview' => $preview
        ]);
    }

    public function browse()
    {
        $products = Input::get('preview') ? Product::all() : Product::available()->get();

        return view('browse')->with([
            'products' => $products
        ]);
    }
}
