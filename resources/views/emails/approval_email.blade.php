@component('mail::message')
    # Employee Appraisal
    The following employee(s) have approved/disapproved  their appraisals

    @foreach($employees as $employee)
        *{{$employee->name}}
    @endforeach

    @component('mail::button', ['url' => 'http://hrportal.local'])
        Please Verify
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

