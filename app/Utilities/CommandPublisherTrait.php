<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 14.11.2018
 * Time: 12:02 PM
 */

namespace App\Utilities;
use SplObserver;


trait CommandPublisherTrait
{
    private $observers = [];
    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     * @since 5.1.0
     */

    public function __construct()
    {
        $this->observers['*'] = [];
    }

    private function initEventGroup(string $event = "*")
    {
        if (! isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = "*")
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers["*"];

        return array_merge($group, $all);
    }

    public function attach(\SplObserver $observer, string $event = "*")
    {
        $this->initEventGroup($event);

        $this->observers[$event][] = $observer;
    }

    public function detach(\SplObserver $observer, string $event = "*")
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }
    public function notify(string $event = "*", $data = null)
    {
//        print("UserRepository: Broadcasting the '$event' event.\n");
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }
}