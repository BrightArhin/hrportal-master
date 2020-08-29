@component('mail::message')
# Employee Appraisal
The following Employees have completed their appraisal

@foreach($employees as $employee)
    *{{$employee->name}}
@endforeach

@component('mail::button', ['url' => 'http://hrportal.local'])
Appraise Employees
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
