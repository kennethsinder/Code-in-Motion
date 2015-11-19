<div class="form-group">
    {!! Form::label('name', 'Name:') !!}<br>
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<!-- Excerpt Form Input -->
<div class="form-group">
    {!! Form::label('excerpt', 'Excerpt:') !!}<br>
    {!! Form::textarea('excerpt', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}<br>
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<!-- Published At Input -->
<div class="form-group">
    {!! Form::label('date_created', 'Created on:') !!}<br>
    {!! Form::input('date', 'date_created', $project->published_at, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('github', 'GitHub link:') !!}<br>
    {!! Form::text('github', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Associated Image:') !!}
    {!! Form::file('image') !!}
</div>

<!-- Add Project Form Input -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}<br>
</div>

<div class="form-group">
    <a href="/projects">{!! Form::button('Return to Projects', ['class' => 'btn btn-danger form-control']) !!}</a>
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag'
        });
    </script>
@endsection('footer')

