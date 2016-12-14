<?php
namespace App;

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data for database');
    }
}