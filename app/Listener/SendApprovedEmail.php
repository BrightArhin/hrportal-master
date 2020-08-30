<?php

namespace App\Listener;

use App\Events\EmployeeApproved;
use App\Mail\ApprovalEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendApprovedEmail
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
     * @param  EmployeeApproved  $event
     * @return void
     */
    public function handle(EmployeeApproved $event)
    {
        try {
            Mail::to($event->employee->email)->send(new ApprovalEmail());
        }catch (\Exception $e){

        }
    }
}
