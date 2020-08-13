@extends('client.layouts.homer')

@section('content')
    <div class="container">
        <h3 style="margin-bottom: 10px; text-align: center">Report By Appraisal Types</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Report Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Completed Appraisals</td>
                <td>
                    <a href={{route('client.appraised_employees')}}><button class="btn btn-info">View</button></a>
                </td>
            </tr>
            <tr>
                <td>Incomplete Appraisals</td>
                <td>
                    <a href='#'><button class="btn btn-info">View</button></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
