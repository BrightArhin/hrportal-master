<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $employeeRole->employee_id }}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{{ $employeeRole->role_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $employeeRole->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $employeeRole->updated_at }}</p>
</div>

