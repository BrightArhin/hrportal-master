<div class="table-responsive">
    <table class="table" id="employeeScores-table">
        <thead>
            <tr>
                <th>Appraisal Id</th>
        <th>Score 1</th>
        <th>Kpi Id 1</th>
        <th>Score 2</th>
        <th>Kpi Id 2</th>
        <th>Score 3</th>
        <th>Kpi Id 3</th>
        <th>Score 4</th>
        <th>Kpi Id 4</th>
        <th>Score 5</th>
        <th>Kpi Id 5</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employeeScores as $employeeScore)
            <tr>
                <td>{{ $employeeScore->appraisal_id }}</td>
            <td>{{ $employeeScore->score_1 }}</td>
            <td>{{ $employeeScore->kpi_id_1 }}</td>
            <td>{{ $employeeScore->score_2 }}</td>
            <td>{{ $employeeScore->kpi_id_2 }}</td>
            <td>{{ $employeeScore->score_3 }}</td>
            <td>{{ $employeeScore->kpi_id_3 }}</td>
            <td>{{ $employeeScore->score_4 }}</td>
            <td>{{ $employeeScore->kpi_id_4 }}</td>
            <td>{{ $employeeScore->score_5 }}</td>
            <td>{{ $employeeScore->kpi_id_5 }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.employeeScores.destroy', $employeeScore->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.employeeScores.show', [$employeeScore->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.employeeScores.edit', [$employeeScore->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
