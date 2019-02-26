<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 19.07.2018
 * Time: 13:30 PM
 */

namespace App\Models\EmailQueue;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="email_queue")
 */
class EmailQueue implements EmailQueueInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="recipient", type="string")
     */
    protected $recepient;

    /**
     * @ORM\Column(name="subject", type="string")
     */
    protected $subject;

    /**
     * @ORM\Column(name="body", type="string")
     */
    protected $body;

    /**
     * @ORM\Column(name="attachment", type="string")
     */
    protected $attachment;

    /**
     * @ORM\Column(name="type", type="string")
     */
    protected $type;

    /**
     * @ORM\Column(name="time_queued", type="datetime")
     */
    protected $time_queued;

    /**
     * @ORM\Column(name="time_scheduled", type="datetime")
     */
    protected $time_scheduled;

    /**
     * @ORM\Column(name="time_sent", type="string", nullable=true)
     */
    protected $time_sent;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $recepient
     */
    public function setRecepient($recepient): void
    {
        $this->recepient = $recepient;
    }

    /**
     * @return string
     */
    public function getRecepient()
    {
        return $this->recepient;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $attachment
     */
    public function setAttachment($attachment): void
    {
        $this->attachment = $attachment;
    }

    /**
     * @return string
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $time_queued
     */
    public function setTimeQueued($time_queued): void
    {
        $this->time_queued = $time_queued;
    }

    /**
     * @return mixed
     */
    public function getTimeQueued()
    {
        return $this->time_queued;
    }

    /**
     * @return mixed
     */
    public function getTimeSent()
    {
        return $this->time_sent;
    }

    /**
     * @param mixed $time_sent
     */
    public function setTimeSent(Carbon $time_sent): void
    {
//        $date = new \DateTime($time_sent);
        $this->time_sent = $time_sent->format('d.m.Y H:i:s');
    }

    /**
     * @param mixed $time_scheduled
     */
    public function setTimeScheduled($time_scheduled): void
    {
        $this->time_scheduled = $time_scheduled;
    }

    /**
     * @return mixed
     */
    public function getTimeScheduled()
    {
        return $this->time_scheduled;
    }
}