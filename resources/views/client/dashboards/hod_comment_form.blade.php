@extends('client.layouts.homer')

@section('content')

    <div class="container" id="printable">

        <div class="container table-information">
            <h2 style=" margin-top :10px; align-self: flex-start">EVALUATION OF KEY RESULT AREAS/DUTIES</h2>

            <table class="table" style="margin-top: 30px">
                <thead>
                <tr>
                    <th>Key Point Indicator</th>
                    <th>Appraisee</th>
                    <th>Appraiser</th>
                </tr>
                </thead>
                <tbody>
                @if($employee_scores->score_1)
                    <tr>
                        <td>{{$employee_scores->kpi_1}}</td>
                        <td style="color: lime">{{$employee_scores->score_1}}</td>
                        <td style="color: red" id="score_1">{{$supervisor_scores->score_1}}</td>
                    </tr>
                @endif
                @if($employee_scores->score_2)
                    <tr>
                        <td>{{$employee_scores->kpi_2}}</td>
                        <td style="color: lime">{{$employee_scores->score_2}}</td>
                        <td style="color: red" id="score_2">{{$supervisor_scores->score_2}}</td>
                    </tr>
                @endif
                @if($employee_scores->score_3)
                    <tr>
                        <td>{{$employee_scores->kpi_3}}</td>
                        <td style="color: lime">{{$employee_scores->score_3}}</td>
                        <td style="color: red" id="score_3">{{$supervisor_scores->score_3}}</td>
                    </tr>
                @endif
                @if($employee_scores->score_4)
                    <tr>
                        <td>{{$employee_scores->kpi_4}}</td>
                        <td style="color: lime">{{$employee_scores->score_4}}</td>
                        <td style="color: red" id="score_4">{{$supervisor_scores->score_4}}</td>
                    </tr>
                @endif
                @if($employee_scores->score_5)
                    <tr>
                        <td>{{$employee_scores->kpi_5}}</td>
                        <td style="color: lime">{{$employee_scores->score_5}}</td>
                        <td style="color: red" id="score_5">{{$supervisor_scores->score_5}}</td>
                    </tr>
                @endif

                </tbody>
            </table>

        </div>

        <h3 style="margin-left: 10px; margin-top: 30px">Overall Rating(After Appraisal Interview)</h3>

        <div class="overall">
            <div class="overall-content">
                <h5>Sum Total Rating</h5>
                <span id="sum"></span>
            </div>
            <div class="overall-content">
                <h5>Number of Key Result Areas(KRA)</h5>
                <span id="count"></span>
            </div>
            <div class="overall-content">
                <h5>Total Average Score(Total Rating/No.KRAs)</h5>
                <span style="color: red" id="avg">{{$avg}}</span>
            </div>
        </div>

        <h4 style="margin-left: 10px;  margin-top: 30px">RECOMMENDATION BY SUPERVISOR</h4>
        @switch($sup_rating)
            @case ('DOUBLE INCREMENT')
            <table class="table-bordered" style="width: 50%; margin-top: 10px; margin-left: 10px">
                <tbody>
                <tr>
                    <td class="tcol">DOUBLE INCREMENT</td>
                    <td class="tcol">3.5 TO 4.4</td>
                    <td class="tcol" style="color: #00bbff">&#10004;</td>
                </tr>
                <tr>
                    <td class="tcol">NORMAL INCREMENT</td>
                    <td class="tcol">2.0 TO 3.4</td>
                    <td class="tcol"></td>
                </tr>
                <tr>
                    <td class="tcol">NO INCREMENT</td>
                    <td class="tcol">BELOW 2.0</td>
                    <td class="tcol"></td>
                </tr>
                </tbody>
            </table>
            @break
            @case ('NORMAL INCREMENT')
            <table class="table-bordered" style="width: 50%; margin-top: 10px; margin-left: 10px">
                <tbody>
                <tr>
                    <td class="tcol">DOUBLE INCREMENT</td>
                    <td class="tcol">3.5 TO 4.4</td>
                    <td class="tcol"></td>
                </tr>
                <tr>
                    <td class="tcol">NORMAL INCREMENT</td>
                    <td class="tcol">2.0 TO 3.4</td>
                    <td class="tcol" style="color: #00bbff">&#10004;</td>
                </tr>
                <tr>
                    <td class="tcol">NO INCREMENT</td>
                    <td class="tcol">BELOW 2.0</td>
                    <td class="tcol" ></td>
                </tr>
                </tbody>
            </table>
            @break
            @case ('NO INCREMENT')
            <table class="table-bordered" style="width: 50%; margin-top: 10px; margin-left: 10px">
                <tbody>
                <tr>
                    <td class="tcol">DOUBLE INCREMENT</td>
                    <td class="tcol">3.5 TO 4.4</td>
                    <td class="tcol"></td>
                </tr>
                <tr>
                    <td class="tcol">NORMAL INCREMENT</td>
                    <td class="tcol">2.0 TO 3.4</td>
                    <td class="tcol"></td>
                </tr>
                <tr>
                    <td class="tcol">NO INCREMENT</td>
                    <td class="tcol">BELOW 2.0</td>
                    <td class="tcol" style="color: #00bbff">&#10004;</td>
                </tr>
                </tbody>
            </table>
            @break
            @default

            <table class="table-bordered" style="width: 50%; margin-top: 10px; margin-left: 10px">
                <tbody>
                <tr>
                    <td>DOUBLE INCREMENT</td>
                    <td>3.5 TO 4.4</td>
                    <td></td>
                </tr>
                <tr>
                    <td>NORMAL INCREMENT</td>
                    <td>2.0 TO 3.4</td>
                    <td></td>
                </tr>
                <tr>
                    <td>NO INCREMENT</td>
                    <td>BELOW 2.0</td>
                    <td></td>
                </tr>
                </tbody>
            </table>



        @endswitch

        <p style="margin: 20px 10px">(<b>NOTE : </b>Above 4.5 - One may be recommended for promotion depending on availability of Vacancies)</p>

        @foreach($sup_comment as $the_comment)
            @if($the_comment)
                <h4 style="margin-top: 20px; margin-left: 10px">DEVELOPMENT/TRAINING NEEDS</h4>
                <div class="comment-box" style="margin-left: 10px">
                    <h4 style="text-align: center; text-decoration: underline">Appraiser Comment</h4>
                    <p><strong>What are his/her development prospects</strong></p>
                    <p>{{$the_comment->supervisor_comment->development_prospects}}</p>
                    <p><strong>Does he/she require any training? If so, specify the Kind of training you
                            recommend</strong>
                    <p>{{$the_comment->supervisor_comment->require_training}}</p>
                </div>
            @endif
        @endforeach

        @foreach($emp_comment as $the_comment)
            @if($the_comment)
                <h4 style="margin-left: 10px">REASON FOR DISAPPROVAL</h4>
                <div class="comment-box" style="margin-left: 10px">
                    <h5 style="font-weight: bold;">Appraisee Comment</h5>
                    <p>{{$the_comment->employee_comment->message}}</p>
                </div>
            @endif
        @endforeach

        <div class="recommendation_form" style="margin-left: 10px">
            <h4>PLEASE ENTER YOUR COMMENT</h4>
            {!! Form::open(['method'=>'POST', 'action'=>['HODCommentsController@store', 'id'=>$appraisal->id]]) !!}

            <div class="form-group">
                {!! Form::textarea('message',null,['class'=>'form-control', 'rows'=>5, 'width'=>'200px']) !!}

            </div>


            <h4>Select the Appropriate Option</h4>
            <div class="form-group">
                <div class="comment-box">
                    <div class="form-group">
                        <span style="margin-right: 120px">Promotion</span>
                        {{Form::radio('promotion_status', 'Promotion')}}
                    </div>
                    <div class="form-group">
                        <span style="margin-right: 70px">Double Increment</span>
                        {{Form::radio('promotion_status', 'Double Increment')}}
                    </div>

                    <div class="form-group">
                        <span style="margin-right: 70px">Normal Increment</span>
                        {{Form::radio('promotion_status', 'Normal Increment')}}
                    </div>


                    <div class="form-group">
                        <span style="margin-right: 103px">No Increment</span>
                        {{Form::radio('promotion_status', 'No Increment')}}
                    </div>
                </div>

                <div class="form-group" style="margin-top: 10px">
                    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                </div>


                {!! Form::close() !!}
            </div>

        </div>

@push('scripts')
            <script>
                $(document).ready(()=>{
                    let sum=0
                    let count =0
                    let average ;
                    if($('#score_1').length){
                        sum += parseInt($('#score_1').text())
                        count++
                    }
                    if($('#score_2').length){
                        sum += parseInt($('#score_2').text())
                        count++
                    }
                    if($('#score_3').length){
                        sum += parseInt($('#score_3').text())
                        count++
                    }
                    if($('#score_4').length){
                        sum += parseInt($('#score_4').text())
                        count++
                    }
                    if($('#score_5').length){
                        sum += parseInt($('#score_5').text())
                        count++
                    }
                    average = sum/count
                    average = parseFloat(average.toFixed(1))
                    $("#sum").text(sum)
                    $("#count").text(count)
                    $("#avg").text(average)
                })
            </script>

    @endpush



@endsection

