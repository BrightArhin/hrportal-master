<!-- Appraisal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('appraisal_id', 'Appraisal Id:') !!}
    {!! Form::text('appraisal_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Score 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score_1', 'Score 1:') !!}
    {!! Form::text('score_1', null, ['class' => 'form-control']) !!}
</div>

<!-- Kpi Id 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kpi_id_1', 'Kpi Id 1:') !!}
    {!! Form::text('kpi_id_1', null, ['class' => 'form-control']) !!}
</div>

<!-- Score 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score_2', 'Score 2:') !!}
    {!! Form::text('score_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Kpi Id 3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kpi_id_3', 'Kpi Id 3:') !!}
    {!! Form::text('kpi_id_3', null, ['class' => 'form-control']) !!}
</div>

<!-- Score 3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score_3', 'Score 3:') !!}
    {!! Form::text('score_3', null, ['class' => 'form-control']) !!}
</div>

<!-- Kpi Id 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kpi_id_2', 'Kpi Id 2:') !!}
    {!! Form::text('kpi_id_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Score 4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score_4', 'Score 4:') !!}
    {!! Form::text('score_4', null, ['class' => 'form-control']) !!}
</div>

<!-- Kpi Id 4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kpi_id_4', 'Kpi Id 4:') !!}
    {!! Form::text('kpi_id_4', null, ['class' => 'form-control']) !!}
</div>

<!-- Score 5 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score_5', 'Score 5:') !!}
    {!! Form::text('score_5', null, ['class' => 'form-control']) !!}
</div>

<!-- Kpi Id 5 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kpi_id_5', 'Kpi Id 5:') !!}
    {!! Form::text('kpi_id_5', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.supervisorScores.index') }}" class="btn btn-default">Cancel</a>
</div>
