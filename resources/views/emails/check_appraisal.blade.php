@component('mail::message')
# Introduction

Your supervisor has finished your appraisal. Please Review to Approve or Disapprove

@component('mail::button', ['url' => ''])
    {{--    todo add official URL To the server--}}
   Visit HR Portal
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
