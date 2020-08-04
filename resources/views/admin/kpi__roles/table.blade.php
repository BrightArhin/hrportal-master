<div class="table-responsive">
    <table class="table" id="kpiRoles-table">
        <thead>
            <tr>
                <th>Kpi Id</th>
        <th>Role Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kpiRoles as $kpiRole)
            <tr>
                <td>{{ $kpiRole->kpi_id }}</td>
            <td>{{ $kpiRole->role_id }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.kpiRoles.destroy', $kpiRole->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.kpiRoles.show', [$kpiRole->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.kpiRoles.edit', [$kpiRole->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
