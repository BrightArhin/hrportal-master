<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $comment->body }}</p>
</div>

<!-- Appraisal Id Field -->
<div class="form-group">
    {!! Form::label('appraisal_id', 'Appraisal Id:') !!}
    <p>{{ $comment->appraisal_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $comment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $comment->updated_at }}</p>
</div>

