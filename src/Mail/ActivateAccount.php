<?php

namespace Plexcellmedia\QuickAuth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class ActivateAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $code;
    public $userId;

    public function __construct($userId, $code)
    {
        $this->code   = $code;
        $this->userId = $userId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $locale  = App::getLocale();
        $subject = __('quickauth::mail.subject.activate');
        $view    = str_replace('%lang%', $locale, config('quickauth.mails.activation'));
        
        return $this->view($view)->subject($subject)->with([
            'code'   => $this->code,
            'userId' => $this->userId
        ]);
    }
}
