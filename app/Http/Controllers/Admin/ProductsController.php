<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        if($user->isAdmin()) {
            $products = Product::paginate(20);
        } else {
            $products = $user->products()->paginate(20);
        }
        return view('admin.products.index')->with([
            'products' => $products,
            'admin' => $user->isAdmin()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.products.edit')->with([
            'user' => User::find(Input::get('user_id'))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        if(!$product->user_id){
            $product->user_id = Auth::user()->id;
            $product->save();
        }
        if($request->images) {
            $imageNames = explode(',', $request->images);
            $order = 0;
            foreach ($imageNames as $imageName) {
                $path = '/uploads/' . $imageName;
                $image = new Image($imageName);
                $image->path = $path;
                $image->name = $imageName;
                $image->order = $order;
                $product->images()->save($image);
                $order++;
            }
        }

        return Redirect::route('products.edit', $product->id)->with([
            'success' => true,
            'message' => 'Product successfully created!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        if($request->images) {
            $imageNames = explode(',', $request->images);
            $order = 0;
            foreach ($imageNames as $imageName) {
                $path = '/uploads/' . $imageName;
                $image = new Image($imageName);
                $image->path = $path;
                $image->name = $imageName;
                $image->order = $order;
                $product->images()->save($image);
                $order++;
            }
        }
        return Redirect::route('products.edit', $product->id)->with([
            'success' => true,
            'message' => 'Product successfully updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
