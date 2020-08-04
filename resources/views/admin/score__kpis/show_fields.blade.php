<!-- Score Id Field -->
<div class="form-group">
    {!! Form::label('score_id', 'Score Id:') !!}
    <p>{{ $scoreKpi->score_id }}</p>
</div>

<!-- Kpi Id Field -->
<div class="form-group">
    {!! Form::label('kpi_id', 'Kpi Id:') !!}
    <p>{{ $scoreKpi->kpi_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $scoreKpi->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $scoreKpi->updated_at }}</p>
</div>

