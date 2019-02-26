<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 30.01.2019
 * Time: 12:01 PM
 */

namespace Tests;


use Illuminate\Support\Facades\Mail;
use Swift_Message;

trait MailTracking
{
    protected $emails = [];


    public function setUpMailTracking()
    {
        Mail::getSwiftMailer()
                ->registerPlugin(new TestingMailEventListener($this)); //prosledjujemo i referencu prema trenutnom objektu, koju u konstruktoru TestingMailEventListener prihvatamo
    }

    protected function seeEmailWasSent()
    {
        $this->assertNotEmpty(
            $this->emails, 'No emails have been sent.'
        );

        return $this; //da se moze continue chaining ostalim metodama
    }

    protected function seeEmailWasNotSent()
    {
        $this->assertEmpty(
            $this->emails, 'Did not expect any emails to have been sent.'
        );

        return $this; //da se moze continue chaining ostalim metodama
    }

    protected function seeEmailEquals($body, Swift_Message $message = null)
    {
        $this->assertEquals(
            $body, $this->getEmail($message)->getBody(),
            "No email with the provided body was sent."
        );
        return $this;
    }

    protected function seeEmailContains($part, Swift_Message $message = null)
    {
        $this->assertContains(
            $part, $this->getEmail($message)->getBody(),
            "No email with the provided body was sent."
        );
        return $this;
    }

    protected function seeEmailsSent($count)
    {
        $emailsSent = count($this->emails);

        $this->assertCount(
            $count, $this->emails,
            "Expected $count emails to have been sent, but $emailsSent sent"
        );
        return $this;
    }

    protected function seeEmailTo($recipient, Swift_Message $message=null)
    {
//        $email = $message ?: end($this->emails); //end poslednji mejl u nizu

        $this->assertArrayHasKey(
            $recipient, $this->getEmail($message)->getTo(),
            "No email was sent to $recipient"
        );
        return $this;
    }

    protected function seeEmailFrom($sender, Swift_Message $message=null)
    {
//        $email = $message ?: end($this->emails); //end poslednji mejl u nizu

        $this->assertArrayHasKey(
            $sender, $this->getEmail($message)->getTo(),
            "No email was sent from $sender"
        );
        return $this;
    }

    public function addEmail(\Swift_Message $email)
    {
        $this->emails[] = $email;
    }

    protected function getEmail(Swift_Message $message = null)
    {
        $this->seeEmailWasSent(); //dodajemo provjeru koju smo prethodno napravili da bismo dobili blji opis greske ako mejl uopste nije poslat
        return $message ?: $this->lastEmail();
    }

    protected function lastEmail()
    {
        return end($this->emails);
    }
}

/* ovo bi bilo najbolje izmjestiti u posebnu klasu, ali da bismo autoloadingom ucitali obje
    mogli bismo i nju autoload i smjestiti u poseban fajl ali i ovo je sasvim u redu
*/
class TestingMailEventListener implements \Swift_Events_EventListener
{
    protected $test;

    public function __construct($test)
    {
        $this->test = $test;
    }

    public function beforeSendPerformed($event)
    {
//        $message = $event->getMessage();
//        dd(get_class_methods($message));
//        dd($event->getMessage()->getTo());
          $this->test->addEmail($event->getMessage());
    }
}