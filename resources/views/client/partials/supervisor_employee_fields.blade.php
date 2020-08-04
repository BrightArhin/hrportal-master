
<h2 style=" margin-top :10px; align-self: flex-start">EVALUATION OF KEY RESULT AREAS/DUTIES</h2>
<table class="table borderless">
    <thead>
    <tr>
        <th>Key Result Areas(KRA)</th>
        <th>Appraisee</th>
        <th>Appraiser</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>
            {{$employeescores->kpi_1}}
        </td>
        <td>
           {{$employeescores->score_1}}
        </td>
        <td>
            {!! Form::select('score_1',[1=>"1", 2=>"2",3=>"3",4=>4,5=>"5"], '', ['class' => 'form-control', 'required' ,'placeholder'=>'Please Select', 'id'=>'score_1']) !!}

        </td>
    </tr>

    <tr>
        <td>
            {{$employeescores->kpi_2}}
        </td>
        <td>
            {{$employeescores->score_2}}
        </td>
        <td>
            {!! Form::select('score_2',[1=>"1", 2=>"2",3=>"3",4=>4,5=>"5"], '', ['class' => 'form-control', 'required' ,'placeholder'=>'Please Select', 'id'=>'score_2']) !!}

        </td>
    </tr>

    <tr>
        <td>
            {{$employeescores->kpi_3}}
        </td>
        <td>
            {{$employeescores->score_3}}
        </td>
        <td>
            {!! Form::select('score_3',[1=>"1", 2=>"2",3=>"3",4=>4,5=>"5"], '', ['class' => 'form-control', 'required' ,'placeholder'=>'Please Select', 'id'=>'score_3']) !!}


        </td>
    </tr>

    <tr>
        <td>
            {{$employeescores->kpi_4}}
        </td>
        <td>
            {{$employeescores->score_4}}
        </td>
        <td>
            {!! Form::select('score_4',[1=>"1", 2=>"2",3=>"3",4=>4,5=>"5"], '', ['class' => 'form-control', 'required' ,'placeholder'=>'Please Select', 'id'=>'score_4']) !!}
        </td>
    </tr>

    <tr>
        <td>
            {{$employeescores->kpi_5}}
        </td>
        <td>
            {{$employeescores->score_5}}
        </td>
        <td>
            {!! Form::select('score_5',[1=>"1", 2=>"2",3=>"3",4=>4,5=>"5"], '', ['class' => 'form-control', 'required' ,'placeholder'=>'Please Select', 'id'=>'score_5']) !!}
            {!! Form::hidden('appraisal_id', $appraisal_id) !!}
        </td>
    </tr>

    </tbody>
</table>





