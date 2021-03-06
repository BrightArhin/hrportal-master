@extends('client.layouts.homer')


@section('content')


    <h3 id="emptotal" style="display: none"> {{count($employee_list)}}</h3>
{{--    {!! Form::open(['method'=>'GET','action'=>'SupervisorAppraisalController@searchForReport']) !!}--}}
{{--    <div class="searching">--}}
{{--        <div class="form-group">--}}

{{--            {!! Form::label('year','Search Report By Year') !!}--}}
{{--            {!! Form::text('year',null,['class'=>'form-control', 'placeholder'=>'eg. 2020']) !!}--}}

{{--        </div>--}}


{{--        <div class="form-group" style="margin-top: 31px">--}}
{{--            {!! Form::submit('search',['class'=>'btn btn-primary']) !!}--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    {!! Form::close() !!}--}}
    @if($employee_list)

        <table id="incomplete" class="table table-borderless">

            <thead>
            <tr>
                <th>Appraisal Year</th>
                <th>Staff Number</th>
                <th>Name</th>
                <th>Current Position</th>
                <th>Total Appraisee Scores</th>
                <th>Total Appraiser Scores</th>
                <th>Average of KRAs(Key Result Areas)</th>
                <th>Appraisal Status</th>
                <th>Double Increment</th>
                <th>Normal Increment</th>
                <th>No Increment</th>
                <th>Recommended Training Type</th>
                <th>Committee Recommendation</th>

            </tr>
            </thead>
            <tbody>

            @for($i; $i<sizeof($employee_list); $i++)
                <tr>
                    <td>{{$the_appraisals[$i]->year}}</td>
                    <td>{{$employee_list[$i]->staff_number}}</td>
                    <td>{{$employee_list[$i]->name}}</td>
                    <td>{{$employee_list[$i]->grade->name}}</td>
                    <td>{{
                                    $the_appraisals[$i]->employeescores->score_1+
                                    $the_appraisals[$i]->employeescores->score_2+
                                    $the_appraisals[$i]->employeescores->score_3+
                                    $the_appraisals[$i]->employeescores->score_4+
                                    $the_appraisals[$i]->employeescores->score_5
                                 }}</td>
                    <td id={{"sup_score_".$i}}>
                        @if($the_appraisals[$i]->supervisorscores)
                        {{
                                    $the_appraisals[$i]->supervisorscores->score_1+
                                    $the_appraisals[$i]->supervisorscores->score_2+
                                    $the_appraisals[$i]->supervisorscores->score_3+
                                    $the_appraisals[$i]->supervisorscores->score_4+
                                    $the_appraisals[$i]->supervisorscores->score_5
                                 }}
                        @endif
                    </td>
                    <td id={{"avg_".$i}}>
                        @if($the_appraisals[$i]->supervisorscores)
                        {{
                                        ($the_appraisals[$i]->supervisorscores->score_1+
                                        $the_appraisals[$i]->supervisorscores->score_2+
                                        $the_appraisals[$i]->supervisorscores->score_3+
                                        $the_appraisals[$i]->supervisorscores->score_4+
                                        $the_appraisals[$i]->supervisorscores->score_5)/5
                                     }}
                        @endif
                    </td>
                    <td style="color:{{$the_appraisals[$i]->status ==='Pending'? 'red' : 'limegreen'}} ">{{$the_appraisals[$i]->status ==='Pending'? 'Only Staff Has Appraised' : 'Supervisor Has Appraised'}}</td>
                    <td style="text-align: center" id={{"double_".$i}}></td>
                    <td style="text-align: center" id={{"normal_".$i}}></td>
                    <td style="text-align: center" id={{"no_".$i}}></td>
                    <td>
                        @if($supComments)
                            @if(array_key_exists((string)$employee_list[$i]->employee_id, $supComments))
                                {{$supComments[$employee_list[$i]->employee_id]}}
                            @endif
                        @endif
                    </td>

                    <td>
                        @if($commitee_recommendation)
                            @if(array_key_exists((string)$employee_list[$i]->employee_id, $commitee_recommendation))
                                {{$commitee_recommendation[$employee_list[$i]->employee_id]}}
                            @endif
                        @endif
                    </td>

                </tr>
            @endfor


            @push('scripts')
                <script>
                    $(document).ready(function () {

                        $('#incomplete').dataTable();

                        let total_emp = parseInt($('#emptotal').text())

                        for (let i = 0; i < total_emp; i++) {
                            let sup_score = parseInt($('#sup_score_'+i).text())
                            let avg = sup_score / 5


                            $("#double_"+i).html('')
                            $("#normal_"+i).html('')
                            $("#no_"+i).html('')
                            if (avg >= 3.5) {
                                $("#double_"+i).html('&#10004;')
                                $("#double_"+i).css('color','#00bbff')


                            } else if (avg >= 2.0 && avg <= 3.4) {
                                $("#normal_"+i).html('&#10004;')
                                $("#normal_"+i).css('color', '#00bbff')

                            } else {
                                $("#no_"+i).html('&#10004;')
                                $("#no_"+i).css('color', '#00bbff')

                            }
                        }
                        $("#export").on("click", function () {
                            html2canvas($('#incomplete')[0], {
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

                        $("#excel").click(function(){
                            $("#incomplete").table2excel({
                                exclude:".noExl",
                                name:"Appraisals Summary Report",
                                filename:"Report.xls",
                                fileext:".xls",
                                exclude_img:false,
                                exclude_links:false,
                                exclude_inputs:false

                            });
                        })



                    })
                </script>


            @endpush

            </tbody>
        </table>

        <button id="export" class="btn btn-warning">Export to Pdf</button>
        <button id="excel" class="btn btn-success">Export to Excel</button>

    @endif

    @if($not_found ?? '')
        <h3 style="color: red">{{$not_found ?? ''}}</h3>
    @endif


@endsection
