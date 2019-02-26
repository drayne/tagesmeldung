<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 14.11.2018
 * Time: 14:24 PM
 */
return [
    'tagesmeldung' => [
        'generated'         => \App\Notifications\Tagesmeldung\TagesmeldungGenerated::class,
        'notGenerated'      => \App\Notifications\Tagesmeldung\TagesmeldungNotGenerated::class,
        'sent'              => \App\Notifications\Tagesmeldung\TagesmeldungSent::class,
        'notSent'           => \App\Notifications\Tagesmeldung\TagesmeldungNotSent::class,
    ]
];