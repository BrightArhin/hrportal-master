<!-- Department Id Field -->
<div class="form-group">
    {!! Form::label('department_id', 'Department Id:') !!}
    <p>{{ $departmentKpi->department_id }}</p>
</div>

<!-- Kpi Id Field -->
<div class="form-group">
    {!! Form::label('kpi_id', 'Kpi Id:') !!}
    <p>{{ $departmentKpi->kpi_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $departmentKpi->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $departmentKpi->updated_at }}</p>
</div>

