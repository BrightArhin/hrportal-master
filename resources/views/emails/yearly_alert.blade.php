@component('mail::message')
# Appraisal Reminder

Its another time of the year for appraisals.
Kindly click on the button below to visit the appraisal system to start your appraisal .

@component('mail::button', ['url' => ''])
{{--    todo Add main server URL--}}
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
