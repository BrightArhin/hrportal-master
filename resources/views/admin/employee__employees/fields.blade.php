<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::text('employee_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Supervisor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supervisor_id', 'Supervisor Id:') !!}
    {!! Form::text('supervisor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.employeeEmployees.index') }}" class="btn btn-default">Cancel</a>
</div>
