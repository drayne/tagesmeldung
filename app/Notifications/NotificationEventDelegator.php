<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 14.11.2018
 * Time: 14:05 PM
 */

namespace App\Notifications;


use App\Notifications\Tagesmeldung\TagesmeldungGenerated;

class NotificationEventDelegator
{
    protected $event;

    public function __construct(string $event)
    {
        $this->event = $event;
    }

    public function getNotification()
    {
        $notification = app()->make('config')->get('eventNotification.' . $this->event);
        return new $notification;
    }
}