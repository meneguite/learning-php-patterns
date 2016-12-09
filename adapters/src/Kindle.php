<?php
namespace App;


class Kindle implements KindleInterface
{
    public function turnOn()
    {
        var_dump('turn the Kindle on');
    }

    public function pressNextButton()
    {
        var_dump('press the next button on the Kindle');
    }
}