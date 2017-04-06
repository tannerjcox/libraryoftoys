<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sports.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $sport = new Sport();
        $sport->fill($request->all());
        $sport->save();
        $sport->users()->save(Auth::user());

        return view('sports.show')->with([
            'sport' => $sport
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Sport $sport)
    {
        return view('sports.show')->with([
            'sport' => $sport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Sport $sport)
    {
        return view('sports.edit')->with([
            'sport' => $sport
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sport $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        //
    }
}
