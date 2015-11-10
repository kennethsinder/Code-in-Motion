<div class="form-group">
    {!! Form::label('title', 'Title:') !!}<br>
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<!-- Form Input -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}<br>
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<!-- Published At Input -->
<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}<br>
    {!! Form::input('date', 'published_at', $blog->published_at, ['class'=>'form-control']) !!}
</div>

<!-- Tags Form Input -->
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}<br>
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('Blog Post Image:') !!}
    {!! Form::file('image') !!}
</div>

<!-- Add Article Form Input -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}<br>
</div>

<div class="form-group">
<a href="/blog">{!! Form::button('Return to Blogs', ['class' => 'btn btn-danger form-control']) !!}</a>
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag'
        });
    </script>
@endsection('footer')

