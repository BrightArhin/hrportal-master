@extends('client.layouts.homer')

@section('content')



        <div class="container">

            <div class="container table-information">

                @if($appraisals)
                    <h2 style=" margin-top :10px; align-self: flex-start">Your Pending Appraisals</h2>
                @else
                    <h2>You currently have no <strong>Pending</strong> Appraisals</h2>
                @endif

                <table class="table" style="margin-top: 10px">
                    <thead>
                    <tr>
                        <th>Appraisal</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($appraisals as $appraisal)

                    <tr>
                        <td>{{\Carbon\Carbon::parse( $appraisal->date_of_appraisal)->isoFormat('MMMM, DD YYYY')}}</td>
                        <td>
                            <a href={{route('client.pending_details', ['id'=>$appraisal->id])}}><button class="btn btn-info" >View</button></a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>

                </div>
            </div>



            </div>
@endsection

