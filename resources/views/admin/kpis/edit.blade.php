@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kpi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kpi, ['route' => ['admin.kpis.update', $kpi->id], 'method' => 'patch']) !!}

                        @include('admin.kpis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection