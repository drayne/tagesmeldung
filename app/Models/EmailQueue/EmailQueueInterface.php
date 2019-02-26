<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 18.12.2018
 * Time: 13:29 PM
 */

namespace App\Models\EmailQueue;

/*
 * kreirano zbog type hintinga za potrebe MailAdaptera
 */
interface EmailQueueInterface
{
    public function getBody();

    public function getSubject();

    public function getAttachment();

    public function getType();

    public function getTimeQueued();

    public function getTimeSent();

    public function getTimeScheduled();

    public function getRecepient();
}