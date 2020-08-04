@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Department  Kpi
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.departmentKpis.store']) !!}

                        @include('admin.department__kpis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
