@extends('layouts.master')

@section('content')
    <a href="/blog" class="btn btn-info" role="button">Return to Blogs</a>
    <h1>{{$blog->title}}</h1>
    <h4>{{Carbon\Carbon::parse($blog->published_at)->format('l, F jS, Y')}}</h4>

    @if($path != null)
        <div class="container text-center">
        {!! HTML::image($path, null, ['class' => 'img-thumbnail center-block offset5']) !!}
        </div><br/><br/>
    @endif

    <article><p class="">
        {!! nl2br(e($blog->body)) !!}
    </p></article>

    <br/>
    @unless ($blog->tags->isEmpty())
        <h4>Tags:</h4>
        <ul class="list-inline">
            @foreach($blog->tags as $tag)
                <li>{!! HTML::link('tags/'.$tag->name, $tag->name,
                    ['class' => 'btn btn-link', 'role' => 'button']) !!}</li>
            @endforeach
        </ul>
    @endunless

    <br/>
    @unless (auth()->guest())
        <a href={{ $blog->id . '/edit' }} class='btn btn-primary' role="button">Edit Blog Post</a>
        <br/><br/>

        {!! Form::open(array('route' => array('blog.destroy', $blog->id), 'method' => 'delete')) !!}
        <button type="submit" class="btn btn-danger">Delete Blog Post</button>
        {!! Form::close() !!}
    @endunless
@stop