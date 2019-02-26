<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 18.12.2018
 * Time: 13:04 PM
 */

namespace App\Mail;


interface MailInterface
{
    public function getSubject();

    public function getBody();

    public function getRecepients();

    public function getAttachments();

    public function getTemplate();
}