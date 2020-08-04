@extends('client.layouts.homer')

@section('content')



        <div class="container">

        <div class="container table-information">
            @if($appraisals)
                <h2 style=" margin-top :10px; align-self: flex-start">Employees to Appraise</h2>
             @else
                <h2 style=" margin-top :10px; align-self: flex-start">You currently have no employees to Appraise</h2>
            @endif

            <table class="table" style="margin-top: 10px">
                <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($appraisals)
                @foreach($appraisals  as $appraisal)
                    <tr>
                        <td>{{$appraisal->employee->name}}</td>
                        <td><a href={{route('employee_form',['id'=>$appraisal->id] )}} class="link"><button class="btn btn-info">Appraise</button></a></td>
                    </tr>
                @endforeach
                    @endif

                </tbody>
            </table>

        </div>

    </div>
@endsection

