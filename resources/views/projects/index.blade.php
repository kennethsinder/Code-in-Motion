@extends('layouts.master')

@section('content')
    <h1>My Projects</h1><hr/>

    @unless (auth()->guest())
        <a href="{{action('ProjectsController@create', [])}}"
                class="btn btn-warning btn-lg" role="button">Add New Project</a>
        <br/><br/>
    @endunless

    @foreach($projects as $project)
        <article>
            <h2>
                <a href="{{action('ProjectsController@show', [$project->id])}}">
                    {{ $project->name }}
                </a>
                <h4 style="font-style: italic;">{{Carbon\Carbon::parse($project->date_created)->format('l, F jS, Y')}}</h4>
            </h2>

            <div class="body lead"> {{str_limit($project->excerpt)}}</div>
        </article>
        <hr/>
    @endforeach
@endsection('content')