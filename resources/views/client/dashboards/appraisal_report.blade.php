@extends('client.layouts.homer')


@section('content')


    <h3 id="totalemployees" style="display: none"> {{count($employee_list)}}</h3>
    {!! Form::open(['method'=>'GET','action'=>'SupervisorAppraisalController@searchForReport']) !!}
    <div class="searching">
        <div class="form-group">

            {!! Form::label('year','Search Report By Year') !!}
            {!! Form::text('year',null,['class'=>'form-control', 'placeholder'=>'eg. 2020']) !!}

        </div>


        <div class="form-group" style="margin-top: 31px">
            {!! Form::submit('search',['class'=>'btn btn-primary']) !!}
        </div>
    </div>


    {!! Form::close() !!}
    @if($employee_list)

        <table id="report" class="table">

            <thead>
            <tr>
                <th>Staff Number</th>
                <th>Name</th>
                <th>Current Position</th>
                <th>Qualification</th>
                <th>Total Appraisee Scores</th>
                <th>Total Appraiser Scores</th>
                <th>Average of KRAs(Key Result Areas)</th>
                <th>Appraisal Status</th>
                <th>Double Increment</th>
                <th>Normal Increment</th>
                <th>No Increment</th>
                <th>Recommended Training Type</th>
                <th>Head of Department's Comment</th>
                <th>Committee Recommendation</th>

            </tr>
            </thead>
            <tbody>

            @for($i; $i<sizeof($employee_list); $i++)
                <tr>
                    <td><a target="_blank" style="text-decoration: underline" href={{route('client.appraisal_details', ['id'=>$the_appraisals[$i]->id])}} >{{$employee_list[$i]->staff_number}}</a></td>
                    <td>{{strtoupper($employee_list[$i]->name)}}</td>
                    <td>{{strtoupper($employee_list[$i]->grade->name)}}</td>
                    <td>{{strtoupper($employee_list[$i]->qualification->name)}}</td>
                    <td>{{
                                    $the_appraisals[$i]->employeescores->score_1+
                                    $the_appraisals[$i]->employeescores->score_2+
                                    $the_appraisals[$i]->employeescores->score_3+
                                    $the_appraisals[$i]->employeescores->score_4+
                                    $the_appraisals[$i]->employeescores->score_5
                                 }}</td>
                    <td id={{"sup_score_".$i}}>{{
                                    $the_appraisals[$i]->supervisorscores->score_1+
                                    $the_appraisals[$i]->supervisorscores->score_2+
                                    $the_appraisals[$i]->supervisorscores->score_3+
                                    $the_appraisals[$i]->supervisorscores->score_4+
                                    $the_appraisals[$i]->supervisorscores->score_5
                                 }}</td>
                    <td id={{"avg_".$i}}>
                        {{
                           ($the_appraisals[$i]->average)
                        }}
                    </td>
                    <td style="color:{{$the_appraisals[$i]->status ==='Completed'? 'blue' : 'red'}} ">{{$the_appraisals[$i]->status ==='Completed'? 'Approved' : 'Disapproved'}}</td>
                    @switch($the_appraisals[$i]->sup_rating)
                        @case ('DOUBLE INCREMENT')
                            <td style="color:#00bbff ;text-align: center" id={{"the_highest_".$i}}>&#10004;</td>
                            <td style="text-align: center" id={{"the_between_".$i}}></td>
                            <td style="text-align: center" id={{"the_lowest_".$i}}></td>
                        @break
                        @case ('NORMAL INCREMENT')
                            <td style="text-align: center" id={{"the_highest_".$i}}></td>
                            <td style="color:#00bbff ;text-align: center" id={{"the_between_".$i}}>&#10004;</td>
                            <td style="text-align: center" id={{"the_lowest_".$i}}></td>
                        @break
                        @case ('NO INCREMENT')
                            <td style="text-align: center" id={{"the_highest_".$i}}></td>
                            <td style="text-align: center" id={{"the_between_".$i}}></td>
                            <td style="color:#00bbff ;text-align: center" id={{"the_lowest_".$i}}>&#10004;</td>
                        @break
                        @default
                        <td style="text-align: center" id={{"the_highest_".$i}}></td>
                        <td style="text-align: center" id={{"the_between_".$i}}></td>
                        <td style="text-align: center" id={{"the_lowest_".$i}}></td>
                    @endswitch
                    <td>
                        @if(array_key_exists((string)$employee_list[$i]->employee_id, $supComments))
                            {{$supComments[$employee_list[$i]->employee_id]}}
                        @endif
                    </td>

                    <td>
                        @if(array_key_exists((string)$employee_list[$i]->employee_id, $hod_comments))
                            {{$hod_comments[$employee_list[$i]->employee_id]}}
                        @endif
                    </td>

                    <td>
                        @if(array_key_exists((string)$employee_list[$i]->employee_id, $commitee_recommendation))
                            {{$commitee_recommendation[$employee_list[$i]->employee_id]}}
                        @endif
                    </td>

                </tr>
            @endfor

            </tbody>
        </table>

        <button id="export" class="btn btn-warning">Export to Pdf</button>
        <button id="excel" class="btn btn-success">Export to Excel</button>

    @endif

    @if($not_found ?? '')
        <h3 style="color: red">{{$not_found ?? ''}}</h3>
    @endif


@endsection


@push('scripts')
    <script>
        $(document).ready(function () {

            $('#report').dataTable();

            let total_emp = parseInt($('#totalemployees').text())


            $("#export").on("click", function () {
                html2canvas($('#report')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("report.pdf");
                    }
                });
            });

            $("#excel").click(function () {
                $("#report").table2excel({
                    exclude: ".noExl",
                    name: "Appraisals Summary Report",
                    filename: "Report.xls",
                    fileext: ".xls",
                    exclude_img: false,
                    exclude_links: false,
                    exclude_inputs: false

                });
            })


        })
    </script>


@endpush
