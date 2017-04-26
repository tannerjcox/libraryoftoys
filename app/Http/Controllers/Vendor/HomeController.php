<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products()
    {
        $products = Auth::user()->products();
        return view('vendor.products.index')->with([
            'products' => $products->paginate(10)
        ]);
    }
}
