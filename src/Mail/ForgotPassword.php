<?php

namespace Plexcellmedia\QuickAuth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $locale  = App::getLocale();
        $subject = __('quickauth::mail.subject.forgot');
        $view    = str_replace('%lang%', $locale, config('quickauth.mails.forgot'));
        
        return $this->view($view)->subject($subject)->with([
            'url'   => $this->url
        ]);
    }
}
