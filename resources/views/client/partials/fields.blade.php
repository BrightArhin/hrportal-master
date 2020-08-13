<table class="table borderless">
    <thead>
    <tr>
        <th>Key Result Areas(KRA)</th>
        <th>Appraisee</th>
        <th>Appraiser</th>
    </tr>
    </thead>
    <tbody>

    @for($i=1; $i<= 5; $i++)
        <tr>
            <td>
                {!! Form::text('kpi_'.$i, null, ['class' => 'form-control', 'required' ,'placeholder'=>'Enter your Kpi']) !!}
            </td>
            <td>
                {!! Form::select('score_'.$i,[1=>"1", 2=>"2",3=>"3",4=>4,5=>"5"], '', ['class' => 'form-control', 'required' ,'placeholder'=>'Please Select', 'id'=>'score_'.$i]) !!}
            </td>
            <td>
                {!! Form::number('sup_score_'.$i, null, ['class' => 'form-control', 'disabled' ,'min'=>0, 'max'=>5]) !!}
            </td>
        </tr>
    @endfor


    @push('scripts')
        <script>
            $(function(){

            const calculateAverage = ()=>{
                let message= '';
                let score_1;
                let score_2;
                let score_3;
                let score_4;
                let score_5;
                let sum;
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


                sum = (score_1 + score_2 + score_3 + score_4 + score_5)


                    message = `Sum of entered scores so far is ${sum} `

                if(score_1 >  5.0 || score_2 >  5.0 || score_3 >  5.0 || score_4 >  5.0 || score_5 >  5.0){
                    message ='One of your ratings exceeds 5. Please Check !!!!!'
                    $('#the_alert').addClass('alert alert-danger')
                }else{
                    $('#the_alert').removeClass('alert alert-danger')
                    $('#the_alert').addClass('alert alert-info')
                }




                    $('#the_alert').fadeIn('fast', ()=>{
                        $('#the_alert > p').text(`${message}`)

                    })


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


    </tbody>
</table>






