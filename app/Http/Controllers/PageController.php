<?php

namespace App\Http\Controllers;

use App\Page;
use App\Product;
use Illuminate\Support\Facades\Input;
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
        if (!$page) return abort(404);

        return view('page.show')->with([
            'page' => $page
        ]);
    }

    public function product(Request $request, $name, $id)
    {
        $product = Product::find($id);
        $preview = $request->preview;
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
        $products = Input::get('preview') ? Product::all()->paginate(12) : Product::available()->paginate(12);

        return view('browse')->with([
            'products' => $products
        ]);
    }
}
