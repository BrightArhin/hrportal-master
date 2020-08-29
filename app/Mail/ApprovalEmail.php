<?php

namespace App\Mail;

use App\Models\Appraisal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ApprovalEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $appraisals = Appraisal::where('supervisor_id', Auth::user()->supervisor_id)->whereStatus('Completed')->get();
        if($appraisals){
            $employees =  $appraisals->map(function($appraisal){
                return $appraisal->employee;
            });
        }

        return $this->markdown('emails.approval_email', compact('employees'));
    }
}