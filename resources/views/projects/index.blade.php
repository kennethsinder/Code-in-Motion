@extends('layouts.master')

@section('content')
    <h1>My Projects</h1><hr/>

    @unless (auth()->guest())
        <a href="{{action('ProjectsController@create', [])}}"
                class="btn btn-warning btn-lg" role="button">Add New Project</a>
        <br/><br/>
    @endunless


    <div class="row">
    @foreach($projects as $i => $project)
        @if($i % 3 == 0 && $i > 0)
            </div><div class="row">
        @endif
        <div class="col-sm-4"><div class="col-sm-12">
            <h2>
                <a href="{{action('ProjectsController@show', [$project->id])}}">
                    {{ $project->name }}
                </a>
                <h4 style="font-style: italic;">{{Carbon\Carbon::parse($project->date_created)->format('F Y')}}</h4>
            </h2>

            <h4> {{str_limit($project->excerpt, 200)}}</h4>
        </div></div>
    @endforeach
    </div>
@endsection('content')