<?php

namespace App\Listener;

use App\Events\PendingAppraisals;
use App\Mail\EmployeeAppraised;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSupervisorEmail
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
     * @param  PendingAppraisals  $event
     * @return void
     */
    public function handle(PendingAppraisals $event)
    {
        Mail::to($event->employee->email)->send(new EmployeeAppraised());
    }
}
