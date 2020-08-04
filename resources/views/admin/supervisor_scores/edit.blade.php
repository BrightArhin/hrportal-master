@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Supervisor Score
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($supervisorScore, ['route' => ['admin.supervisorScores.update', $supervisorScore->id], 'method' => 'patch']) !!}

                        @include('admin.supervisor_scores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection