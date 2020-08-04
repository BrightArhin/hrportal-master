<div class="table-responsive">
    <table class="table" id="scoreKpis-table">
        <thead>
            <tr>
                <th>Score Id</th>
        <th>Kpi Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($scoreKpis as $scoreKpi)
            <tr>
                <td>{{ $scoreKpi->score_id }}</td>
            <td>{{ $scoreKpi->kpi_id }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.scoreKpis.destroy', $scoreKpi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.scoreKpis.show', [$scoreKpi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.scoreKpis.edit', [$scoreKpi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
