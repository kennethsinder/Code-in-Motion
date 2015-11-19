@extends('layouts.master')

@section('content')
    <a href="/projects" class="btn btn-info" role="button">Return to Projects</a>
    <h1>{{$project->name}}</h1>
    <h4>{{Carbon\Carbon::parse($project->date_created)->format('l, F jS, Y')}}</h4>

    @if($path != null)
        <div class="container text-center">
            {!! HTML::image($path, null, ['class' => 'img-thumbnail center-block offset5']) !!}
        </div><br/><br/>
    @endif

    @if ($project->github)
        <p><h4>{{$project->github}}</h4></p>
    @endif

    <article><p class="">
            {!! nl2br(e($project->description)) !!}
    </p></article>

    <br/>
    @unless (auth()->guest())
        <a href={{ $project->id . '/edit' }} class='btn btn-primary' role="button">Edit Project</a>
        <br/><br/>

        {!! Form::open(array('route' => array('projects.destroy', $project->id), 'method' => 'delete')) !!}
        <button type="submit" class="btn btn-danger">Delete Blog Post</button>
        {!! Form::close() !!}
    @endunless
@stop