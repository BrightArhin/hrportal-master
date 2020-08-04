<div class="table-responsive">
    <table class="table" id="departmentKpis-table">
        <thead>
            <tr>
                <th>Department Id</th>
        <th>Kpi Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departmentKpis as $departmentKpi)
            <tr>
                <td>{{ $departmentKpi->department_id }}</td>
            <td>{{ $departmentKpi->kpi_id }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.departmentKpis.destroy', $departmentKpi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.departmentKpis.show', [$departmentKpi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.departmentKpis.edit', [$departmentKpi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
