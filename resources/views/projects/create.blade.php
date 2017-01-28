@extends('layouts.master')

@section('content')
    <h1>Add a New Project</h1><hr/>

    @include('errors.list')

    {!! Form::model($project = new \App\Project, ['url' => 'projects',
     'class' => 'form',
     'novalidate' => 'novalidate',
     'files' => true]) !!}
    @include('projects.form', ['submitButtonText' => 'Add Project'])
    {!! Form::close() !!}
@endsection('content')