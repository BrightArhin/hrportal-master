<div class="table-responsive">
    <table class="table" id="scores-table">
        <thead>
            <tr>
                <th>Appraisal Id</th>
        <th>Staff Score</th>
        <th>Supscore</th>
        <th>Kpi Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($scores as $score)
            <tr>
                <td>{{ $score->appraisal_id }}</td>
            <td>{{ $score->staff_score }}</td>
            <td>{{ $score->supscore }}</td>
            <td>{{ $score->kpi_name }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.scores.destroy', $score->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.scores.show', [$score->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.scores.edit', [$score->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
