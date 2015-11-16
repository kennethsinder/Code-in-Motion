@extends('layouts.master')

@section('content')
    <h1>Blog Posts</h1><hr/>

    <form action="/search" method="GET" class="form">
        <label for="query">Search Blog</label>
        <input type="query" id="query" name="query"
               class="form-control" placeholder="Which blog post are you looking for?"><br/>
        <input type="submit" class="btn btn-primary form-control" value="Search">
    </form>
    <hr/>

    @unless (auth()->guest())
        <a href="/blog/create" class="btn btn-warning btn-lg" role="button">Write New Blog Post</a>
        <br/><br/>
    @endunless

    @if (Request::is('tags/*'))
        <a href="/blog" class="btn btn-primary btn-lg" role="button">Clear Tag Filter</a>
    @endif

    @if (Request::is('*search*'))
        <a href="/blog" class="btn btn-primary btn-lg" role="button">Clear Search</a>
    @endif

    @foreach($blogs as $blog)
        <article>
            <h2>
                <a href="{{action('BlogsController@show', [$blog->id])}}">
                    {{ $blog->title }}
                </a>
                <h4 style="font-style: italic;">{{Carbon\Carbon::parse($blog->published_at)->format('l, F jS, Y')}}</h4>
            </h2>

            <div class="body lead"> {{str_limit($blog->body)}}</div>
        </article>
        <hr/>
    @endforeach
@stop