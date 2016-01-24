@extends('layouts.master')

@section('content')
<h1>About {{ $first }}</h1><hr/>

<h4 style="line-height: 150%;">
    @unless (auth()->guest()) <a href="pages/about/edit" class="btn btn-primary">Edit Text</a><br/><br/>
    @endunless
    {!!$text!!}<br/>

    <div style="font-weight: bold;"><br>Relevant Courses:<br></div><ul>
    @foreach($courses as $course)
        <li>{{ $course }}</li>
    @endforeach
    </ul>

    <h3><a href="resume.pdf" target="_blank">My Resume</a></h3><br/>

    <h5>This site was built using the <a href="http://laravel.com/">Laravel framework</a> for PHP.</h5>
</h4>
@stop