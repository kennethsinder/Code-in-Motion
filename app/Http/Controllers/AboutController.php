<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    function index()
    {
        $first = 'Kenneth';
        $last = 'Sinder';
        $courses = ['Programming Principles', 'Methods of Software Engineering'];
        return view('about.index')->with(compact('first' , 'last', 'courses'));
    }
}
