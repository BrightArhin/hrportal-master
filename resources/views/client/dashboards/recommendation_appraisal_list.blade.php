@extends('client.layouts.homer')

@section('content')
<h3>Appraisals pending recommendation</h3>
<table class="table table-borderless">
    <thead>
    <tr>
        <th>Employee</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($appraisals as $appraisal )
        @if($appraisal !== null)
        <tr>
            <td>{{$appraisal->employee->name}}</td>
            <td><a href="{{route('recommend_appraisal_details', ['id'=>$appraisal->id])}}"><button class="btn btn-info">View</button></a></td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>

@endsection
