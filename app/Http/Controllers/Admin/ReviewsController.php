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
     * @param  \App\Review $product
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        if(!Auth::user()->isAdmin() && Auth::user()->id != $product->user_id) {
            Redirect::route('admin.products.index')->with([
                'message' => 'You don\'t have permission to edit this product',
                'success' => false
                ]);
        }
        return view('admin.reviews.edit', [
            'review' => $review
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Review $review)
    {
        $review->update($request->all());


        return Redirect::route('reviews.edit', $review->id)->with([
            'success' => true,
            'message' => 'Product successfully updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
