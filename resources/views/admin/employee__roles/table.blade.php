<div class="table-responsive">
    <table class="table" id="employeeRoles-table">
        <thead>
            <tr>
                <th>Employee Id</th>
        <th>Role Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employeeRoles as $employeeRole)
            <tr>
                <td>{{ $employeeRole->employee_id }}</td>
            <td>{{ $employeeRole->role_id }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.employeeRoles.destroy', $employeeRole->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.employeeRoles.show', [$employeeRole->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.employeeRoles.edit', [$employeeRole->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
