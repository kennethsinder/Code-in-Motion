@extends('layouts.master')

@section('content')
    <h1>Code in Motion</h1>
    <h4>Homepage of <strong><a href="about">Kenneth Sinder</a></strong>,
        Software Engineering student at the University of Waterloo</h4><hr/>

    <table class="leftJustified">

    <tr>
        <td><h4><span class="homepageSubtitle">Latest Blog Post:&nbsp;</span></h4></td>
        <td><h4><a href="{{"blog/".$blog->id}}">{{$blog->title}}</a></h4></td>
    </tr>
    <tr>
        <td><h4><span class="homepageSubtitle">Latest Project:&nbsp;</span></h4></td>
        <td><h4><a href="{{"projects/".$project->id}}">{{$project->name}}</a></h4></td>
    </tr>
    <tr>
        <td><h4><span class="homepageSubtitle">Resume (PDF):&nbsp;</span></h4></td>
        <td><h4><a href="resume.pdf" target="_blank">My Resume</a></h4></td>
    </tr>
    <tr>
        <td><div><img src="images/linkedin.png"/></div></td>
        <td><h4><a href="https://ca.linkedin.com/in/kenneth-sinder-aa5040102">LinkedIn Profile</a></h4></td>
    </tr>

    <tr>
        <td><div><img src="images/github.png"/></div></td>
        <td><h4><a href="https://github.com/kennethsinder">GitHub Profile</a></h4></td>
    </tr>

    <tr>
        <td><div"><img src="images/email.png"/></div></td>
        <td><h4><a href="/contact">Contact Me via Email</a></h4></td>
    </tr>

    </table>

    <!-- Location and Weather script -->
    <script type="text/javascript" src="{{ URL::asset('js/weather.js') }}"></script>

    <h4><span id="temp"></span><a href="#" id="wrongloc" title="Wrong Location?"></a></h4>
@endsection