@extends('client.layouts.homer')


@section('content')


    <h3 id="totalemp" style="display: none"> {{count($employee_list)}}</h3>

    @if($employee_list)

        <table id="summary" class="table">

            <thead>
            <tr>
                <th>Appraisal Year</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Rank</th>
                <th>Date of Appointment</th>
                <th>Date of Last Promotion</th>
                <th>Location</th>
                <th>Current Qualification</th>
                <th>Average of KRAs(Key Result Areas)</th>
                <th>Years on Current Grade</th>
                <th>Recommendation</th>


            </tr>
            </thead>
            <tbody>

            @for($i; $i<sizeof($employee_list); $i++)
                <tr>
                    <td>{{$the_appraisals[$i]->year}}</td>
                    <td>{{$employee_list[$i]->name}}</td>
                    <td>{{strtoupper(\Carbon\Carbon::parse( $employee_list[$i]->birth_date)->isoFormat('MMMM D, YYYY'))}}</td>
                    <td>{{$employee_list[$i]->job->name}}</td>
                    <td>{{strtoupper(\Carbon\Carbon::parse( $employee_list[$i]->date_first_appointment)->isoFormat('MMMM DD, YYYY'))}}</td>
                    <td>
                        @if($employee_list[$i]->date_last_promotion === null)
                            {{strtoupper(\Carbon\Carbon::parse( $employee_list[$i]->date_first_appointment)->isoFormat('MMMM DD, YYYY'))}}
                        @else
                            {{strtoupper(\Carbon\Carbon::parse( $employee_list[$i]->date_last_promotion)->isoFormat('MMMM DD, YYYY'))}}

                        @endif
                    </td>
                    <td>
                        {{strtoupper($employee_list[$i]->location->name)}}
                    </td>
                    <td>
                        {{strtoupper($employee_list[$i]->qualification->name)}}
                    </td>
                    <td style=" text-align: center">
                        {{number_format($the_appraisals[$i]->average, 1, '.', '')}}
                    </td>
                    <td style=" text-align: center">
                        @if($employee_list[$i]->date_last_promotion)
                            {{\Carbon\Carbon::parse($employee_list[$i]->date_last_promotion)->diff(\Carbon\Carbon::now())->format('%y')}}
                            @else
                            {{\Carbon\Carbon::parse($employee_list[$i]->date_first_appointment)->diff(\Carbon\Carbon::now())->format('%y')}}

                        @endif
                    </td>
                    <td>{{strtoupper($the_appraisals[$i]->promotion_status)}}</td>

                </tr>
            @endfor




            </tbody>
            <tfoot>
            <tr>
                <th>Year</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Rank</th>
                <th>DOA</th>
                <th>DOLP</th>
                <th>Location</th>
                <th>Current Qualification</th>
                <th>Average</th>
                <th>Yrs on Grade</th>
                <th>Recommended</th>
            </tr>
            </tfoot>
        </table>

        <button id="sum_pdf" class="btn btn-warning">Export to Pdf</button>
        <button id="sum_excel" class="btn btn-success">Export to Excel</button>

    @endif


    @push('scripts')
        <script>
            $(document).ready(function () {

                $('#summary tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="'+title+'" />' );
                } );

                $('#summary').dataTable({
                    initComplete: function () {
                        // Apply the search
                        this.api().columns().every( function () {
                            var that = this;

                            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                                if ( that.search() !== this.value ) {
                                    that
                                        .search( this.value )
                                        .draw();
                                }
                            } );
                        } );
                    }
                });


                $("#sum_pdf").on("click", function () {
                    html2canvas($('#summary')[0], {
                        onrendered: function (canvas) {
                            var data = canvas.toDataURL();
                            var docDefinition = {
                                content: [{
                                    image: data,
                                    width: 500
                                }]
                            };
                            pdfMake.createPdf(docDefinition).download("summary_report_"+new Date().getFullYear()+".pdf");
                        }
                    });
                });

                $("#sum_excel").click(function(){
                    $("#summary").table2excel({
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

@endsection
