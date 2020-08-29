@component('mail::message')
# Review

Your supervisor has finished your appraisal. Please Review to Approve or Disapprove

@component('mail::button', ['url' => 'http://hrportal.local'])
   Visit HR Portal
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
