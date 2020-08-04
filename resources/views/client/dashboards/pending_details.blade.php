@extends('client.layouts.homer')

@section('content')

        <div class="container">

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
                    <tr>
                        <td>{{$employee_scores->kpi_1}}</td>
                        <td style="color: lime">{{$employee_scores->score_1}}</td>
                        <td style="color: red"></td>
                    </tr>
                    <tr>
                        <td>{{$employee_scores->kpi_2}}</td>
                        <td style="color: lime">{{$employee_scores->score_2}}</td>
                        <td style="color: red"></td>
                    </tr>
                    <tr>
                        <td>{{$employee_scores->kpi_3}}</td>
                        <td style="color: lime">{{$employee_scores->score_3}}</td>
                        <td style="color: red"></td>
                    </tr>
                    <tr>
                        <td>{{$employee_scores->kpi_4}}</td>
                        <td style="color: lime">{{$employee_scores->score_4}}</td>
                        <td style="color: red"></td>
                    </tr>
                    <tr>
                        <td>{{$employee_scores->kpi_5}}</td>
                        <td style="color: lime">{{$employee_scores->score_5}}</td>
                        <td style="color: red"></td>
                    </tr>

                    </tbody>
                </table>

            </div>

            <h3 style="margin-left: 10px; margin-top: 30px">Overall Rating(After Appraisal Interview)</h3>

            <div class="overall">
                <div class="overall-content">
                    <h5>Sum Total Rating</h5>
                    <span></span>
                </div>
                <div class="overall-content">
                    <h5>Number of Key Result Areas(KRA)</h5>
                    <span></span>
                </div>
                <div class="overall-content">
                    <h5>Total Average Score(Total Rating/No.KRAs)</h5>
                    <span style="color: red"></span>
                </div>
            </div>

            <h4 style="margin-left: 10px;  margin-top: 30px">RECOMMENDATION BY SUPERVISOR</h4>

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
                        <td class="tcol"></td>
                    </tr>
                    </tbody>
                </table>

            <p style="margin: 20px 10px">(<b>NOTE : </b>Above 4.5 - One may be recommended for promotion depending on availability of Vacancies)</p>


                    <h4 style="margin-top: 30px; margin-left: 10px">DEVELOPMENT/TRAINING NEEDS</h4>
                    <div class="comment-box" style="margin-left: 10px">
                        <p><strong>What are his/her development prospects</strong></p>
                        <p>.......................................................................</p>
                        <p><strong>Does he/she require any training? If so, specify the Kind of training you recommend</strong></p>
                        <p>.......................................................................</p>
                    </div>

        </div>






@endsection

