@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Score  Kpi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($scoreKpi, ['route' => ['admin.scoreKpis.update', $scoreKpi->id], 'method' => 'patch']) !!}

                        @include('admin.score__kpis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection