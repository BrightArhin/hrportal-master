@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Employee  Employee
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($employeeEmployee, ['route' => ['admin.employeeEmployees.update', $employeeEmployee->id], 'method' => 'patch']) !!}

                        @include('admin.employee__employees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection