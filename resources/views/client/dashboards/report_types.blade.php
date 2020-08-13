@extends('client.layouts.homer')

@section('content')
    <div class="container">
        <h3 style="margin-bottom: 10px; text-align: center">Report By Appraisal Status</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Report Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Completed Appraisals By Department</td>
                <td>
                    <a href={{route('client.dept_list')}}><button class="btn btn-info">View</button></a>
                </td>
            </tr>
            <tr>
                <td>Incomplete Appraisals By Department</td>
                <td>
                    <a href={{route('client.dept_list_incomplete')}}><button class="btn btn-info">View</button></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
