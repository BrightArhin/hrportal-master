<!-- Appraisal Id Field -->
<div class="form-group">
    {!! Form::label('appraisal_id', 'Appraisal Id:') !!}
    <p>{{ $appraisalKpi->appraisal_id }}</p>
</div>

<!-- Kpi Id Field -->
<div class="form-group">
    {!! Form::label('kpi_id', 'Kpi Id:') !!}
    <p>{{ $appraisalKpi->kpi_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $appraisalKpi->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $appraisalKpi->updated_at }}</p>
</div>

