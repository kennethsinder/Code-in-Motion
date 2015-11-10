@extends('layouts.master')

@section('content')
    <h1>Create a New Blog Post</h1><hr/>

    @include('errors.list')

    {!! Form::model($blog = new \App\Blog, ['url' => 'blog',
     'class' => 'form',
     'novalidate' => 'novalidate',
     'files' => true]) !!}
    @include('blog.form', ['submitButtonText' => 'Add Blog Post'])
    {!! Form::close() !!}
@stop