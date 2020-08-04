@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Employee
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($employee, ['route' => ['admin.employees.update', $employee->employee_id], 'method' => 'patch']) !!}

                        @include('admin.employees.edit_fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
