<?php

namespace App\Listener;

use App\Events\YearlyAppraisal;
use App\Mail\YearlyAppraisalAlert;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_TransportException;

class SendReminder
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
     * @param  YearlyAppraisal  $event
     * @return string
     */
    public function handle(YearlyAppraisal $event)
    {
        try {

               Mail::to($event->employee->email)->send(new YearlyAppraisalAlert());
        } catch (\Exception $e) {
            report($e);
        }
    }

    public function checkConnection(){
        try{
            $transport = Swift_SmtpTransport::newInstance('mail.cocobod.gh', '587');
            $transport->setUsername('hr.info@cocobod.gh');
            $transport->setPassword('hr@2020??_Wel');
            $mailer = Swift_Mailer::newInstance($transport);
            $mailer->getTransport()->start();
            return 'ok';
        } catch (Swift_TransportException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
