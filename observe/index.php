<?php

// Publisher
interface Subject
{
    public function attach(Observer $observer);

    public function detach($index);

    public function notify();
}


// Subscriber
interface Observer
{
    public function handle();
}

class Auth implements Subject
{

    protected $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;

        return $this;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }

    public function fire()
    {
        $this->notify();
    }
}

class LogHandler implements Observer
{
    public function handle()
    {
        var_dump('LogHander');
    }
}

class EmailNotifier implements Observer
{
    public function handle()
    {
        var_dump('EmailNotifier');
    }
}

class LoginReporter implements Observer
{
    public function handle()
    {
        var_dump('LoginReporter');
    }
}

$login = new Auth;
$login->attach(new LogHandler())
    ->attach(new EmailNotifier())
    ->attach(new LoginReporter())
    ->fire();


