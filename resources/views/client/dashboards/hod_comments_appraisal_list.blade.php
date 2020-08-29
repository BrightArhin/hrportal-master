@extends('client.layouts.homer')

@section('content')

        <h3>Appraisals pending review</h3>
        <table class="table table-borderless">
            <thead>
            <tr>
                <th>Employee</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($appraisals as $appraisal )
                @if($appraisal !== null)
                    <tr>
                        <td>{{$appraisal->employee->name}}</td>
                        <td><a href="{{route('hod_comment_appraisal_details', ['id'=>$appraisal->id])}}">
                                <button class="btn btn-info">View</button>
                            </a></td>
                    </tr>
                @endif
            @empty
                <div>
                    <p>No appraisals to review</p>
                </div>
            @endforelse
            </tbody>
        </table>



@endsection
