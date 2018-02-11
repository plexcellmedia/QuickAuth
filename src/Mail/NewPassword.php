<?php

namespace Plexcellmedia\QuickAuth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class NewPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $password;

    public function __construct($password)
    {
        $this->password = $password;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $locale  = App::getLocale();
        $subject = __('quickauth::mail.subject.reset');
        $view    = str_replace('%lang%', $locale, config('quickauth.mails.reset'));
        
        return $this->view($view)->subject($subject)->with([
            'password' => $this->password
        ]);
    }
}
