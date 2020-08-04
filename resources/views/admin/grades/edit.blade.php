@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Grade
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($grade, ['route' => ['admin.grades.update', $grade->id], 'method' => 'patch']) !!}

                        @include('admin.grades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection