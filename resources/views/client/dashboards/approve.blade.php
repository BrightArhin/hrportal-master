@extends('client.layouts.homer')

@section('content')



        <div class="container">

            <div class="container table-information">
                @if($appraisal)
                    <h2 style=" margin-top :10px; align-self: flex-start">Your Appraisals Yet to be Approved</h2>
                @else
                    <h2>You currently have no appraisals to approve</h2>
                @endif
                <table class="table" style="margin-top: 10px">
                    <thead>
                    <tr>
                        <th>Appraisal</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($appraisal)
                        @if($appraisal->status == 'Evaluated')
                            <tr>
                                <td>{{\Carbon\Carbon::parse( $appraisal->date_of_appraisal)->isoFormat('MMMM, DD YYYY')}}</td>
                                <td><a href={{route('client.emp_appraise.show',['emp_appraise'=>$appraisal->id] )}} class="link"><button class="btn btn-info">View</button></a></td>
                            </tr>
                        @endif
                    @endif

                    </tbody>
                </table>

            </div>
        </div>
@endsection

