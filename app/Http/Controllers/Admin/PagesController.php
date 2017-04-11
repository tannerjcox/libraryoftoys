<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePageRequest;
use App\Page;
use Illuminate\Http\Request;
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
        return view('admin.pages.edit')->with(['page' => null]);
    }

    public function store(StorePageRequest $request)
    {
        $page = new Page();
        $page->title = $request->title;
        $page->page_content = $request->page_content;
        $page->url = $request->url;
        $page->save();

        return Redirect::route('pages.edit', $page->id);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit')->with(['page' => $page]);
    }



    public function update(StorePageRequest $request, Page $page)
    {
        $page->title = $request->title;
        $page->content = $request->page_content;
        $page->url = $request->url;
    }

}
