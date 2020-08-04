@extends('client.layouts.appraisal')

@section('content')



                                <div >
                                    {!! Form::open(['route' => 'store_appraisal']) !!}

                                    @include('client.partials.supervisor_employee_fields')

                                </div>

                                <div class="alert alert-danger alert-dismissible" id="the_errors" style="display: none;">
                                    <a href="#" onclick="$('#the_errors').hide()" class="close"  aria-label="close">&times;</a>
                                    <p></p>
                                </div>

                                <h3 style=" margin-top: 30px">Overall Rating(After Appraisal Interview)</h3>

                                <div id="scoring" >
                                    <div  class="overall" style="margin-left: 0 ; margin-bottom: 30px">
                                        <div class="overall-content">
                                            <h5>Sum Total Rating</h5>
                                            <span id="total" ></span>
                                        </div>
                                        <div class="overall-content">
                                            <h5>Number of Key Result Areas(KRA)</h5>
                                            <span id="num"></span>
                                        </div>
                                        <div class="overall-content">
                                            <h5>Total Average Score(Total Rating/No.KRAs)</h5>
                                            <span style="color: red" id="avg"></span>
                                        </div>
                                    </div>
                                    <h3 style=" margin-top: 30px">RECOMMENDATION BY SUPERVISOR</h3>
                                    <table class="table-bordered" style="width: 50%; margin-top: 10px">
                                        <tbody>
                                        <tr>
                                            <td class="tcol">DOUBLE INCREMENT</td>
                                            <td class="tcol">3.5 TO 4.4</td>
                                            <td id="the_highest" class="tcol"></td>
                                        </tr>
                                        <tr>
                                            <td class="tcol">NORMAL INCREMENT</td>
                                            <td class="tcol">2.0 TO 3.4</td>
                                            <td id="the_between"  class="tcol"></td>
                                        </tr>
                                        <tr>
                                            <td class="tcol">NO INCREMENT</td>
                                            <td class="tcol">BELOW 2.0</td>
                                            <td id="the_lowest" class="tcol"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p style="margin-bottom: 30px ;margin-top: 10px">(<b>NOTE : </b>Above 4.5 - One may be recommended for promotion depending on availability of Vacancies)</p>

                                </div>


                                <div class="row">
                                    <h3 style="margin-left: 20px">DEVELOPMENT/TRAINING NEEDS</h3>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('development_prospects', 'What are his/her development prospects?') !!}
                                        {!! Form::textarea('development_prospects', null, ['class' => 'form-control', 'rows'=>'5']) !!}
                                    </div>

                                    <div class="form-group col-sm-12">
                                        {!! Form::label('require_training', 'Does he/she require any training? If so, specify the kind of training you recommend') !!}
                                        {!! Form::textarea('require_training', null, ['class' => 'form-control', 'rows'=>'5']) !!}
                                    </div>


                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('client.emp_appraise.index') }}" class="btn btn-default">Cancel</a>
                                    </div>

                                    {!! Form::close() !!}
                                </div>

    @push('scripts')
        <script>
            $(document).ready(()=>{
                let score_1;
                let score_2;
                let score_3;
                let score_4;
                let score_5;
                let average = 0.0;
                let sum =0
                let message= '';

                function calculateAverage(){

                    if($('#score_1').val() ===''){
                        score_1 = 0;
                    }else{
                        score_1 = parseInt($('#score_1').val())
                    }
                    if($('#score_2').val() === ''){
                        score_2 = 0;
                    }else{
                        score_2 = parseInt($('#score_2').val())
                    }
                    if($('#score_3').val() === ''){
                        score_3 = 0;
                    }else{
                        score_3 = parseInt($('#score_3').val())
                    }
                    if($('#score_4').val() === ''){
                        score_4 = 0;
                    }else{
                        score_4 = parseInt($('#score_4').val())
                    }
                    if($('#score_5').val() === ''){
                        score_5 = 0;
                    }else{
                        score_5 = parseInt($('#score_5').val())
                    }
                     sum = score_1 + score_2 + score_3 + score_4 + score_5;
                     average = (score_1 + score_2 + score_3 + score_4 + score_5)/5
                    $('#num').html(5);
                    $('#total').html(sum);
                    $('#avg').html(average);

                    $("#the_highest").html('')
                    $("#the_between").html('')
                    $("#the_lowest").html('')
                    if(average >= 3.5) {
                        $("#the_highest").html('&#10004;')
                        $("#the_highest").css('color' ,'#00bbff')
                    }else if(average >=2.0 && average <= 3.4) {
                        $("#the_between").html('&#10004;')
                        $("#the_between").css('color' ,'#00bbff')
                    }else {
                        $("#the_lowest").html('&#10004;')
                        $("#the_lowest").css('color' ,'#00bbff')
                    }
                    if(score_1 >  5.0 || score_2 >  5.0 || score_3 >  5.0 || score_4 >  5.0 || score_5 >  5.0){
                        message ='One of your ratings exceeds 5. Please Check !!!!!'
                        $('#the_errors').fadeIn('fast', ()=>{
                            $('#the_errors > p').text(message)
                        })
                    }else{
                        $('#the_errors').hide()
                    }
                }

                $('#score_1').change(()=> {
                    calculateAverage()
                })
                $('#score_2').change(()=> {
                    calculateAverage()

                })
                $('#score_3').change(()=> {
                    calculateAverage()
                })
                $('#score_4').change(()=> {
                    calculateAverage()
                })
                $('#score_5').change(()=> {
                    calculateAverage()

                })
            })




        </script>
    @endpush


@endsection

