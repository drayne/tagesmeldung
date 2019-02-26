<?php

namespace App\Mail;

use App\Models\EmailQueue\EmailQueueInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AtosMemoMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $emailQueue;
    protected $email;

    /**
     * Create a new message instance.
     *
     * @param EmailQueueInterface $emailQueue
     */
    public function __construct(EmailQueueInterface $emailQueue)
    {
        $this->emailQueue = $emailQueue;
        $this->email = new EmailQueueAdapter($this->emailQueue);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $template = $this->email->getTemplate();
        return $this->view('emails.'. $template)
                    ->subject($this->email->getSubject())
                    ->to($this->email->getRecepients())
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->with([
                        'body' => $this->email->getBody()
                    ]);
    }
}
