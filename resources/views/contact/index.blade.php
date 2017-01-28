@extends('layouts.master')

@section('content')
    <ul class="errors">
        @foreach ($errors->all('<li>:message</li>') as $message)
        @endforeach
    </ul>

    <h1>
       Contact Form
    </h1><hr/>

    <p><h4 style="line-height: 150%;">
        @unless (auth()->guest()) <a href="pages/contact/edit" class="btn btn-primary">Edit Text</a><br/><br/>
        @endunless
        {!! $text !!}
    </h4></p>

    {!! Form::open(['url' => 'contact_request', 'class' => 'form container']) !!}

    <div class="form-group">
        {!! Form::label('first_name', 'Name:') !!}<br>
        {!! Form::input('first_name', 'first_name', '', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Your E-mail Address:') !!}<br>
        {!! Form::input('email', 'email', '', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('message', 'Message:') !!}<br>
        {!! Form::textarea('body', '', ['placeholder' => null, 'class' =>
            'form-control', 'id' => 'body', 'rows' => '4']) !!}
    </div>

    <div class="form-group" style="text-align: center;">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-lg']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')