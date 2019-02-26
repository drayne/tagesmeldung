<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 18.12.2018
 * Time: 13:27 PM
 */

namespace App\Mail;


use App\Models\EmailQueue\EmailQueueInterface;

class EmailQueueAdapter implements MailInterface
{
    protected $email;

    public function __construct(EmailQueueInterface $emailQueue)
    {
        $this->email = $emailQueue;
    }

    public function getSubject()
    {
        return $this->email->getSubject();
    }

    public function getBody()
    {
        return $this->email->getBody();
    }

    public function getRecepients()
    {
        return explode(',', $this->email->getRecepient());
    }

    public function getAttachments()
    {
        return explode(',', $this->email->getAttachment());
    }

    public function getTemplate()
    {
        if ($this->email->getType() == 'vip_steta')
        {
            return 'atosMemo';
        };
    }
}