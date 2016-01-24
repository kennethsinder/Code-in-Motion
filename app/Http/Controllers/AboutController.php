<?php namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    function index()
    {
        $first = 'Kenneth';
        $last = 'Sinder';
        $courses = ['Programming Principles', 'Methods of Software Engineering',
                    'Data Abstraction and Implementation', 'Digital Circuits and Systems'];
        $text = Page::where('location', 'about')->first()->text;
        return view('about.index')->with(compact('first' , 'last', 'courses', 'text'));
    }
}
