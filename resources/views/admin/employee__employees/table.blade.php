<div class="table-responsive">
    <table class="table" id="employeeEmployees-table">
        <thead>
            <tr>
                <th>Employee Id</th>
        <th>Supervisor Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employeeEmployees as $employeeEmployee)
            <tr>
                <td>{{ $employeeEmployee->employee_id }}</td>
            <td>{{ $employeeEmployee->supervisor_id }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.employeeEmployees.destroy', $employeeEmployee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.employeeEmployees.show', [$employeeEmployee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.employeeEmployees.edit', [$employeeEmployee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
