<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function _construct()
    {}

    public function index()
    {
        $text = \App\Page::where('location', 'contact')->first()->text;
        return view('contact.index', compact('text'));
    }

    public function submit()
    {
        $data = Input::all();
        $rules = [
            'first_name' => 'required',
            'email' => 'required|email',
            'body' => 'required|min:5'];

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            Mail::send('contact.email', $data, function($message) use ($data)
            {
                $message->from($data['email'], $data['first_name']);
                $message->from('kenneth@codeinmotion.net', 'contact form');
                $message->to('kenneth@codeinmotion.net', 'Kenneth')->
                    cc('kennethsinder@outlook.com')->subject('contact form submit');
            });
            return redirect('/')->with('flash_message', 'Your message has been sent. Thank you!');
        }
        else
        {
            return redirect()->back()->withInput()->
            with(['flash_message' => 'Check that you have filled out all fields and that the e-mail is valid.',
                'flash_message_error' => true]);
        }
    }
}
