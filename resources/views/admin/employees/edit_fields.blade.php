

<div class="form-group col-sm-6">
    {!! Form::label('staff_number', 'Staff Number:') !!}
    {!! Form::text('staff_number', null, ['class' => 'form-control']) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Birth Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_date', 'Birth Date:') !!}
    {!! Form::text('birth_date', null, ['class' => 'form-control','id'=>'birth_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birth_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Date First Appointment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_first_appointment', 'Date First Appointment:') !!}
    {!! Form::text('date_first_appointment', null, ['class' => 'form-control','id'=>'date_first_appointment']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_first_appointment').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Date Last Promotion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_last_promotion', 'Date Last Promotion:') !!}
    {!! Form::text('date_last_promotion', null, ['class' => 'form-control','id'=>'date_last_promotion']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_last_promotion').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Active' => 'Active', 'InActive' => 'InActive'], null, ['class' => 'form-control', 'placeholder'=>'Please Select ...']) !!}
</div>


<!-- isSupervisor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('isSupervisor', 'isSupervisor:') !!}
    {!! Form::select('isSupervisor', [0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control']) !!}
</div>

<!-- isAdmin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('isAdmin', 'isAdmin:') !!}
    {!! Form::select('isAdmin', [0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control', 'placeholder'=>'Please Select ...']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_id', 'Location :') !!}
    {!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder'=>'Please Select ...']) !!}
</div>

<!-- Department Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department :') !!}
    {!! Form::select('department_id', $departments, null, ['class' => 'form-control','placeholder'=>'Please Select ...' ]) !!}
    @push('scripts')
        <script>
            let the_location;

            the_location = $('#location_id').val()
            $('#location_id').change(function(){
                the_location = this.value

            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });

            //ON LOAD
            $.ajax({
                type: "POST",
                url: '/getSupervisor',
                data: {id:$('#department_id').val(), location: the_location},
                success: (response)=>{

                    if(response.message[0].employees.length === 0){
                        console.log('It didnt work')
                        $('#supervisor_id')
                            .find('option')
                            .remove()
                            .end()
                        $('#supervisor_id').append('<option ></option>')
                    }
                    console.log('It worked')
                    $('#supervisor_id')
                        .find('option')
                        .remove()
                        .end()
                    $('#supervisor_id').append('<option ></option>')
                    response.message[0].employees.forEach(employee=>{
                        $('#supervisor_id').append('<option value='+employee.employee_id+'>'+employee.name+'</option>')
                    })
                } ,
            });



            $('#department_id').change(function(){


                $('#supervisor_id').append('<option ></option>')
                $.ajax({
                    type: "POST",
                    url: '/getSupervisor',
                    data: {id:this.value, location: the_location},
                    success: (response)=>{
                        console.log(response)

                        if(response.message[0].employees.length === 0){
                            $('#supervisor_id')
                                .find('option')
                                .remove()
                                .end()
                            $('#supervisor_id').append('<option ></option>')
                        }
                        $('#supervisor_id')
                            .find('option')
                            .remove()
                            .end()
                        $('#supervisor_id').append('<option ></option>')
                        response.message[0].employees.forEach(employee=>{
                            $('#supervisor_id').append('<option value='+employee.employee_id+'>'+employee.name+'</option>')
                        })
                    } ,
                });
            })

        </script>
    @endpush

</div>

<!-- Supervisor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supervisor_id', 'Supervisor:') !!}
    {!! Form::select('supervisor_id',[], null, ['class' => 'form-control','placeholder'=>'Please Select ...']) !!}
</div>


<!-- Grade Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grade_id', 'Grade :') !!}
    {!! Form::select('grade_id', $grades, null, ['class' => 'form-control', 'placeholder'=>'Please Select ...']) !!}
</div>





<!-- Job Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_id', 'Job :') !!}
    {!! Form::select('job_id', $jobs, null, ['class' => 'form-control', 'placeholder'=>'Please Select ...']) !!}
</div>

<!-- Qualification Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qualification_id', 'Qualification :') !!}
    {!! Form::select('qualification_id', $qualifications, null, ['class' => 'form-control', 'placeholder'=>'Please Select ...']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.employees.index') }}" class="btn btn-default">Cancel</a>
</div>
