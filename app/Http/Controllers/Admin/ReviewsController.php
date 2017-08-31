<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Review;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $reviews = Review::paginate(20);

        return view('admin.reviews.index')->with([
            'reviews' => $reviews,
            'admin' => $user->isAdmin()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $product = Product::find(Input::get('product_id'));
        $review = Review::create($request->all());
        $product->reviews()->save($review);

        return redirect($product->full_url)->with([
            'success' => true,
            'message' => 'Review submitted!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(!Auth::user()->isAdmin() && Auth::user()->id != $product->user_id) {
            Redirect::route('admin.products.index')->with([
                'message' => 'You don\'t have permission to edit this product',
                'success' => false
                ]);
        }
        return view('admin.products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());
        if ($request->images) {
            $imageNames = explode(',', $request->images);
            $this->storeImages($imageNames, $product);
        }

        return Redirect::route('products.edit', $product->id)->with([
            'success' => true,
            'message' => 'Product successfully updated!'
        ]);
    }

    private function storeImages(array $imageNames, Product $product)
    {
        $order = $product->images->count() ? max($product->images()->pluck('order')->toArray()) + 1 : 0;
        foreach ($imageNames as $key => $imageName) {
            $extension = \File::extension(public_path("/uploads/{$imageName}"));
            $newName = "{$product->url}-{$order}.{$extension}";
            $img = \Intervention\Image\Facades\Image::make(public_path("/uploads/{$imageName}"));
            $img->save(public_path("images/products/{$newName}"));
            $img->resize(null, Image::THUMBNAIL_HEIGHT, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("images/products/thumbs/{$newName}"));
            $img->resize(null, Image::MEDIUM_HEIGHT, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("images/products/medium/{$newName}"));

            $path = '/images/products/';
            $image = new Image($newName);
            $image->path = $path;
            $image->name = $newName;
            $image->order = $order;
            $product->images()->save($image);
            $order++;

            \File::delete(public_path("/uploads/{$imageName}"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
