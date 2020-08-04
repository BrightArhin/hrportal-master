@extends('client.layouts.homer')

@section('content')



        <div class="container">

            <div class="container table-information">
                @if($appraisals !== null)
                <h2 style=" margin-top :10px; align-self: flex-start">Approved Appraisals</h2>
                @else
                    <h2 style=" margin-top :10px; align-self: flex-start">You currently have no completed Appraisals</h2>
                @endif

                <table class="table" style="margin-top: 10px">
                    <thead>
                    <tr>
                        <th>Appraisal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($appraisals as $appraisal)

                    <tr>
                        <td>{{\Carbon\Carbon::parse( $appraisal->date_of_appraisal)->isoFormat('MMMM, DD YYYY')}}</td>
                        <td style="color: {{$appraisal->status == 'Completed' ? 'lime' : 'red'}}">{{$appraisal->status == 'Completed' ? 'Approved' : 'Disapproved'}}</td>
                        <td>
                            <a href={{route('client.appraisal_details', ['id'=>$appraisal->id])}}><button class="btn btn-info" >View</button></a>
                        </td>
                
                    </tr>
                @endforeach
                    </tbody>
                </table>

                </div>
        </div>


@endsection

