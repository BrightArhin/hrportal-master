@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Appraisal
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($appraisal, ['route' => ['admin.appraisals.update', $appraisal->id], 'method' => 'patch']) !!}

                        @include('admin.appraisals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection