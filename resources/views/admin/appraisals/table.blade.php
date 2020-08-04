<div class="table-responsive">
    <table class="table" id="appraisals-table">
        <thead>
            <tr>
                <th>Date Of Appraisal</th>
        <th>Employee Id</th>
        <th>Supervisor Id</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($appraisals as $appraisal)
            <tr>
                <td>{{ $appraisal->date_of_appraisal }}</td>
            <td>{{ $appraisal->employee_id }}</td>
            <td>{{ $appraisal->supervisor_id }}</td>
                <td>{{ $appraisal->status }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.appraisals.destroy', $appraisal->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.appraisals.show', [$appraisal->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.appraisals.edit', [$appraisal->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
