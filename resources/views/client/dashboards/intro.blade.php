@extends('client.layouts.welcomer')

@section('content')
    <div style="display: flex">
        <div>
            <img src="{{asset('images/cocobod.jpg')}}"  alt="">
        </div>
        <div style="margin-left: 20px">
            <h3 style="font-weight: bold"><strong>INSTRUCTIONS</strong></h3>
            <ol type="i">
                <li>Before Completing the form, please:
                    <ol type="a">
                        <li>
                            Refer to the employees job description to review the major duties and Responsibilities
                        </li>
                        <li>Review the objectives for the previous year</li>
                        <li>Conisder the following points:
                            <ol type="1">
                                <li>What results are expected from the employee?</li>
                                <li>What has been the employees contribution?</li>
                                <li>Has the employee been working to full potential</li>
                                <li>How could this employee's performance be improved</li>
                                <li>What potential exists for growth?</li>
                            </ol>
                        </li>
                    </ol>
                    <p>This finalized copy is approved by the employee, appraiser and forwarded to the reviewing <br>
                        supervisor for approval. The completed form  is forwarded to the Human Resource Management,
                        <br>
                        not later than two days after the completed processes.
                    </p>
                </li>
                <li>
                    <p>
                        For the purpose of this report, discuss with the appraisee at a review <br>
                        meeting the outcome of the rating, and insert the appropriate rating in the <br>
                        space provided as follows:
                    </p>

                    <ol reversed>
                        <li>- Outstanding/Exceptional Performance</li>
                        <li>- Very Good/Exceeds Expectation</li>
                        <li>- Satisfactory/Meets Expectation</li>
                        <li>- Indifferent/Marginal Performance</li>
                        <li>- Below Average/ Unsatisfactory</li>
                    </ol>
                </li>
            </ol>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Rating</th>
            <th>Explanation</th>
            <th>Deviation</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>5</td>
            <td>Excellent Performance in exceeding <br> objective</td>
            <td>
                <p>
                    Exceptional Performance Performance : <br>
                    If performance is above +10 of the required standard
                </p>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Objective met at a level of performance <br> above required standard</td>
            <td>
                <p>
                    Exceed Expectation: <br>
                    If Performance is above +5 of the required standard
                </p>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                Objective met at a level of performance above required
            </td>
            <td>Meet Expectation</td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <p>
                    Performance has not met some of the <br>requirements of the objective <br>
                    May have some development needs
                </p>
            </td>
            <td>
                <p>
                    Marginal Performance: <br>
                    If performance is below -5% of the required standard
                </p>

            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <p>Performance has met some of the <br>requirement of the objective and <br> performance must improve
                    significantly </p>
            </td>
            <td>
                <p>
                    Unsatisfactory Performance
                    If performance is below -10% of the required standard
                </p>
            </td>
        </tr>
        </tbody>
    </table>
    <a href="/bio_welcome">
        <button class="btn btn-success" style="margin-left: 84%; width: 200px">Next</button>
    </a>
@endsection
