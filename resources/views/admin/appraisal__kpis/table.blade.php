<div class="table-responsive">
    <table class="table" id="appraisalKpis-table">
        <thead>
            <tr>
                <th>Appraisal Id</th>
        <th>Kpi Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($appraisalKpis as $appraisalKpi)
            <tr>
                <td>{{ $appraisalKpi->appraisal_id }}</td>
            <td>{{ $appraisalKpi->kpi_id }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.appraisalKpis.destroy', $appraisalKpi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.appraisalKpis.show', [$appraisalKpi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.appraisalKpis.edit', [$appraisalKpi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
