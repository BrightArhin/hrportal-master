<!-- Appraisal Id Field -->
<div class="form-group">
    {!! Form::label('appraisal_id', 'Appraisal Id:') !!}
    <p>{{ $score->appraisal_id }}</p>
</div>

<!-- Staff Score Field -->
<div class="form-group">
    {!! Form::label('staff_score', 'Staff Score:') !!}
    <p>{{ $score->staff_score }}</p>
</div>

<!-- Supscore Field -->
<div class="form-group">
    {!! Form::label('supscore', 'Supscore:') !!}
    <p>{{ $score->supscore }}</p>
</div>

<!-- Kpi Name Field -->
<div class="form-group">
    {!! Form::label('kpi_name', 'Kpi Name:') !!}
    <p>{{ $score->kpi_name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $score->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $score->updated_at }}</p>
</div>

