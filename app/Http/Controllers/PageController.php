<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'delete']]);
    }

    function create()
    {
        return view('pages.create');
    }

    function store(Request $request)
    {
        $page = new Page([
            'location' => $request->get('location'),
            'text' => $request->get('text'),
        ]);
        $page->save();
        return redirect('/')->with([
            'flash_message' => 'Your page data has been created.'
        ]);
    }

    function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    function update(Page $page, Request $request)
    {
        $page->update([
            'location' => $page->location,
            'text' => $request->get('text'),
        ]);
        $page->save();
        return redirect('/')->with([
            'flash_message' => 'Your page data has been updated successfully.'
        ]);
    }
}
