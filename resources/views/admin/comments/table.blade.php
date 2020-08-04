<div class="table-responsive">
    <table class="table" id="comments-table">
        <thead>
            <tr>
                <th>Body</th>
        <th>Appraisal Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->body }}</td>
            <td>{{ $comment->appraisal_id }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.comments.destroy', $comment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.comments.show', [$comment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.comments.edit', [$comment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
