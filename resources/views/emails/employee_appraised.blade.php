@component('mail::message')
# Employee Appraisal
The following Employees have completed their appraisal

@foreach($employees as $employee)
    *{{$employee->full_name}}
@endforeach

@component('mail::button', ['url' => ''])
{{--    todo add official URL To the server--}}
Appraise Employees
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
