<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Appraisal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('appraisal_id', 'Appraisal Id:') !!}
    {!! Form::text('appraisal_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.comments.index') }}" class="btn btn-default">Cancel</a>
</div>
