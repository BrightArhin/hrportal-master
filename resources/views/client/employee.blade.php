@extends('client.layouts.appraisal')

@section('content')

                            @if($status ==='')

                                <div class="app-form">
                                    {!! Form::open(['route' => 'client.emp_appraise.store']) !!}
                                    <h2>EVALUATION OF KEY RESULT AREAS</h2>
                                    @include('client.partials.fields')

                                    <div class="alert alert-info alert-dismissible" id="the_alert" style="display: none;">
                                        <a href="#" onclick="$('#the_alert').hide()" class="close"  aria-label="close">&times;</a>
                                        <p><strong>Success!</strong> Indicates a successful or positive action.</p>
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

                                    <h4 style="font-weight: bold; margin-top: 30px; margin-left: 10px">RECOMMENDATION BY SUPERVISOR</h4>

                                    <table class="table bordered" style="width: 50%; margin-top: 10px; margin-left: 10px">
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

                                    <p style="margin-left: 10px; margin-bottom: 20px">(<b>NOTE : </b>Above 4.5 - One may be recommended for promotion depending on availability of Vacancies)</p>

                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('client.emp_appraise.index') }}" class="btn btn-danger">Cancel</a>
                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            @else
                                <div class="locked">
                                <h3 style="color: red">{{$status}}</h3>
                                </div>
                    @endif



@endsection

