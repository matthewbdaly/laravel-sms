<?php

namespace Matthewbdaly\LaravelSMS;

use Matthewbdaly\SMS\Contracts\Mailer;

/**
 * Wrapper for the Laravel Mail interface to use it to send emails to the SMS gateway
 *
 */
class MailAdapter implements Mailer
{
    /**
     * Send email
     *
     * @param string $recipient The recipent's email.
     * @param string $message   The message.
     * @return boolean
     */
    public function send(string $recipient, string $message)
    {
        $mailer = app()->make('Illuminate\Contracts\Mail\Mailer');
        return $mailer->to($recipient)->raw($message);
    }
}
