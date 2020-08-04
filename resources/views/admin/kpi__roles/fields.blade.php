<!-- Kpi Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kpi_id', 'Kpi Id:') !!}
    {!! Form::text('kpi_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role Id:') !!}
    {!! Form::text('role_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.kpiRoles.index') }}" class="btn btn-default">Cancel</a>
</div>
