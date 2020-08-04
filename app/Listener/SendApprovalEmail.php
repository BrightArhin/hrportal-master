<?php

namespace App\Listener;

use App\Events\EmployeeAppraised;
use App\Mail\AppraisalMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendApprovalEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EmployeeAppraised  $event
     * @return void
     */
    public function handle(EmployeeAppraised $event)
    {
        Mail::to($event->employee->email)->send(new AppraisalMail());
    }
}
