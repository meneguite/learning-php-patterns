<?php

abstract class HomeChecker
{
    protected $successor;

    public abstract function check(HomeStatus $home);

    public function setNext(HomeChecker $successor)
    {
        $this->successor = $successor;
        return $successor;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor) {
            $this->successor->check($home);
        }
    }
}

class Locks extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( !$home->locked ) {
            throw new \Exception('The doors are not locked!! Abort.');
        }
        var_dump('locks');

        $this->next($home);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( !$home->lightOff ) {
            throw new \Exception('The lights are still on!! Abort.');
        }
        var_dump('lights');

        $this->next($home);
    }
}

class Alarm extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( !$home->alarmOn ) {
            throw new \Exception('The alarm has not been set!! Abort.');
        }
        var_dump('alarm');

        $this->next($home);
    }
}

class HomeStatus
{
    public $alarmOn = true;
    public $locked = true;
    public $lightOff = true;
}

$locks = new Locks();
$lights = new Lights();
$alarm = new Alarm();

$locks->setNext($lights)
    ->setNext($alarm);

try {
    $locks->check(new HomeStatus());
} catch (\Exception $e) {
    var_dump("Warning: ".$e->getMessage());
}