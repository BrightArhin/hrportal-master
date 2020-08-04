<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead>
        <tr>
            <th>Employee Id</th>
            <th>Supervisor Id</th>
            <th>Staff Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Birth Date</th>
            <th>Department</th>
            <th>Grade</th>
            <th>Location</th>
            <th>Qualification</th>
            <th>Job</th>
            <th>Date First Appointment</th>
            <th>Date Last Promotion</th>
            <th>Status</th>
            <th>isAdmin</th>
            <th>isSupervisor</th>
            <th >Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->supervisor_id }}</td>
                <td>{{ $employee->staff_number }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->password }}</td>
                <td>{{ $employee->birth_date }}</td>
                <td>@if($employee->department)
                        {{ $employee->department->name }}
                    @else
                        {{''}}
                    @endif
                </td>
                <td>@if($employee->grade)
                        {{ $employee->grade->name }}
                    @else
                        {{''}}
                    @endif
                </td>


                <td>@if($employee->location)
                        {{ $employee->location->name }}
                    @else
                        {{''}}
                    @endif

                </td>

                <td>@if($employee->qualification)
                        {{ $employee->qualification->name }}
                    @else
                        {{''}}
                    @endif</td>

                <td>@if($employee->job)
                        {{ $employee->job->name }}
                    @else
                        {{''}}
                    @endif
                </td>
                <td>{{ $employee->date_first_appointment }}</td>
                <td>{{ $employee->date_last_promotion }}</td>
                <td>{{ $employee->status }}</td>
                <td>{{ $employee->isAdmin }}</td>
                <td>{{ $employee->isSupervisor}}</td>
                <td>
                    {!! Form::open(['route' => ['admin.employees.destroy', $employee->employee_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.employees.show', [$employee->employee_id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.employees.edit', [$employee->employee_id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#employees-table').dataTable();
            })
        </script>
    @endpush
</div>
