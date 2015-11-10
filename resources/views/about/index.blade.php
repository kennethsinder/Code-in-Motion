@extends('layouts.master')

@section('content')
<h1>About {{ $first }}</h1>

<p>
    {{ $first }} {{ $last }} is a Software Engineering student at the University of Waterloo.<br/>

    <br>Relevant Courses:<br><ul>
    @foreach($courses as $course)
        <li>{{ $course }}</li>
    @endforeach
    </ul>
</p>
@endsection('content')