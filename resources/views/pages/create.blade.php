@extends('layouts.master')

@section('content')
    <h1>Create a New Page</h1><hr>

    @include('errors.list')

    {!! Form::open(['url' => 'pages']) !!}
        <div class="form-group">
            {!! Form::label('location', 'Name:') !!}<br>
            {!! Form::text('location', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Page Text:') !!}<br>
            {!! Form::textarea('text', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit("Create Page Text", ['class'=>'btn btn-primary form-control']) !!}<br>
        </div>

        <div class="form-group">
            <a href="/">{!! Form::button('Return Home', ['class' => 'btn btn-danger form-control']) !!}</a>
        </div>
    {!! Form::close() !!}
@endsection('content')