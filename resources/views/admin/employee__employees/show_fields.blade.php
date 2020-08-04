<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $employeeEmployee->employee_id }}</p>
</div>

<!-- Supervisor Id Field -->
<div class="form-group">
    {!! Form::label('supervisor_id', 'Supervisor Id:') !!}
    <p>{{ $employeeEmployee->supervisor_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $employeeEmployee->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $employeeEmployee->updated_at }}</p>
</div>

