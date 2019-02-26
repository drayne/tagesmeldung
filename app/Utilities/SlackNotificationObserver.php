<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 14.11.2018
 * Time: 12:36 PM
 */

namespace App\Utilities;


use App\Notifications\NotificationEventDelegator;
use App\Notifications\Tagesmeldung\TagesmeldungGenerated;
use App\Notifications\Tagesmeldung\TagesmeldungSent;
use App\Facades\AdminNotify;
use SplSubject;

class SlackNotificationObserver implements \SplObserver
{

    public function update(SplSubject $subject, string $event = null, $data = null)
    {
        $delegator = new NotificationEventDelegator($event);
        AdminNotify::send($delegator->getNotification());
    }
}