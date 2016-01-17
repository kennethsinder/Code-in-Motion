@extends('layouts.master')

@section('content')
    <h1>Edit Project Details</h1><hr/>

    @include('errors.list')

    {!! Form::model($project, ['method' => 'PATCH',
            'action' => ['ProjectsController@update', $project],
             'class' => 'form',
             'novalidate' => 'novalidate',
             'files' => true]) !!}
        @include('projects.form', ['submitButtonText' => 'Confirm Changes to Project'])
    {!! Form::close() !!}
@stop