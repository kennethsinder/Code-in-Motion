@extends('layouts.master')

@section('content')
    <h1>Edit Page: {{$page->location}}</h1><hr>

    @include('errors.list')

    {!! Form::open(['action' => ['PageController@update', $page->location], 'method' => 'patch']) !!}
    <div class="form-group">
        {!! Form::label('location', 'Name:') !!}<br>
        {!! Form::text('location', $page->location, ['class'=>'form-control', 'disabled' => 'true']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Page Text:') !!}<br>
        {!! Form::textarea('text', $page->text, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("Confirm Changes to Page Text", ['class'=>'btn btn-primary form-control']) !!}<br>
    </div>

    <div class="form-group">
        <a href="/">{!! Form::button('Return Home', ['class' => 'btn btn-danger form-control']) !!}</a>
    </div>
    {!! Form::close() !!}
@endsection('content')