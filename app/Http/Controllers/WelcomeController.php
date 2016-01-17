<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = \App\Blog::latest()->first();
        $project = \App\Project::latest('date_created')->first();
        return view('welcome')->with(compact('blog', 'project'));
    }
}
