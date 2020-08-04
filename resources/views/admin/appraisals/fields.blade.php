<!-- Date Of Appraisal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_appraisal', 'Date Of Appraisal:') !!}
    {!! Form::text('date_of_appraisal', null, ['class' => 'form-control','id'=>'date_of_appraisal']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_of_appraisal').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

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
    <a href="{{ route('admin.appraisals.index') }}" class="btn btn-default">Cancel</a>
</div>
