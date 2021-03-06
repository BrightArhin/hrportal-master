@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kpi  Role
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kpiRole, ['route' => ['admin.kpiRoles.update', $kpiRole->id], 'method' => 'patch']) !!}

                        @include('admin.kpi__roles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection