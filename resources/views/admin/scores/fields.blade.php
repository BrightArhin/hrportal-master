<!-- Appraisal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('appraisal_id', 'Appraisal Id:') !!}
    {!! Form::text('appraisal_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Staff Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('staff_score', 'Staff Score:') !!}
    {!! Form::text('staff_score', null, ['class' => 'form-control']) !!}
</div>

<!-- Supscore Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supscore', 'Supscore:') !!}
    {!! Form::text('supscore', null, ['class' => 'form-control']) !!}
</div>

<!-- Kpi Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kpi_name', 'Kpi Name:') !!}
    {!! Form::text('kpi_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.scores.index') }}" class="btn btn-default">Cancel</a>
</div>
