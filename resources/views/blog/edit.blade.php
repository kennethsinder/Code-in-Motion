@extends('layouts.master')

@section('content')
    <h1>Edit: {!! $blog->title !!}</h1>

    @include('errors.list')

    {!! Form::model($blog, ['method' => 'PATCH',
             'action' => ['BlogsController@update', $blog],
             'class' => 'form',
             'novalidate' => 'novalidate',
             'files' => true]) !!}
        @include('blog.form', ['submitButtonText' => 'Update Blog Post'])
    {!! Form::close() !!}
@stop