@extends('client.layouts.homer')

@section('content')

<table id="sum_dept_list" class="table table-borderless">
    <thead>
    <tr>
        <th>Department</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($departments as $department )
        <tr>
            <td>{{strtoupper($department->name)}}</td>
            <td><a href="{{route('sum_listing',['id'=>$department->id])}}"><button class="btn btn-info">View</button></a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
