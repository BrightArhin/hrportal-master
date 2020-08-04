<!-- Date Of Appraisal Field -->
<div class="form-group">
    {!! Form::label('date_of_appraisal', 'Date Of Appraisal:') !!}
    <p>{{ $appraisal->date_of_appraisal }}</p>
</div>

<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $appraisal->employee_id }}</p>
</div>

<!-- Supervisor Id Field -->
<div class="form-group">
    {!! Form::label('supervisor_id', 'Supervisor Id:') !!}
    <p>{{ $appraisal->supervisor_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $appraisal->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $appraisal->updated_at }}</p>
</div>

