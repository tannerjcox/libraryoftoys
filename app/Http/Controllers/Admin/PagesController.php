<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePageRequest;
use App\Page;
use Illuminate\Support\Facades\Redirect;

class PagesController
{
    public function index()
    {
        return view('admin.pages.index')->with([
            'pages' => Page::all()
        ]);
    }

    public function create()
    {
        return view('admin.pages.edit');
    }

    public function store(StorePageRequest $request)
    {
        $page = Page::create([
            'title' => $request->title,
            'page_content' => $request->page_content,
            'url' => $request->url
        ]);

        return Redirect::route('pages.edit', $page->id)->with([
            'success' => true
        ]);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit')->with([
            'page' => $page
        ]);
    }


    public function update(StorePageRequest $request, Page $page)
    {
        $page->update($request->all());

        return Redirect::route('pages.edit', $page->id)->with([
            'success' => true,
            'message' => 'Page successfully updated'
        ]);
    }

}
