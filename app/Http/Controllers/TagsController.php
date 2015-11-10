<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $blogs =  $tag->blogs()->published()->get();
        return view('blog.index', compact('blogs'));
    }
}
