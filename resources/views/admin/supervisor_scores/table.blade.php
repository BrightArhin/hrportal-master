<div class="table-responsive">
    <table class="table" id="supervisorScores-table">
        <thead>
            <tr>
                <th>Appraisal Id</th>
        <th>Score 1</th>
        <th>Kpi Id 1</th>
        <th>Score 2</th>
        <th>Kpi Id 3</th>
        <th>Score 3</th>
        <th>Kpi Id 2</th>
        <th>Score 4</th>
        <th>Kpi Id 4</th>
        <th>Score 5</th>
        <th>Kpi Id 5</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($supervisorScores as $supervisorScore)
            <tr>
                <td>{{ $supervisorScore->appraisal_id }}</td>
            <td>{{ $supervisorScore->score_1 }}</td>
            <td>{{ $supervisorScore->kpi_id_1 }}</td>
            <td>{{ $supervisorScore->score_2 }}</td>
            <td>{{ $supervisorScore->kpi_id_3 }}</td>
            <td>{{ $supervisorScore->score_3 }}</td>
            <td>{{ $supervisorScore->kpi_id_2 }}</td>
            <td>{{ $supervisorScore->score_4 }}</td>
            <td>{{ $supervisorScore->kpi_id_4 }}</td>
            <td>{{ $supervisorScore->score_5 }}</td>
            <td>{{ $supervisorScore->kpi_id_5 }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.supervisorScores.destroy', $supervisorScore->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.supervisorScores.show', [$supervisorScore->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.supervisorScores.edit', [$supervisorScore->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
