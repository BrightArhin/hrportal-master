@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Employee Score
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($employeeScore, ['route' => ['admin.employeeScores.update', $employeeScore->id], 'method' => 'patch']) !!}

                        @include('admin.employee_scores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection