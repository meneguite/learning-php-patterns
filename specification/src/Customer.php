<?php
namespace App;


class Customer
{
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }
}