<?php
/**
 * Defines the program skeleton of an algorithm in an operation, deferring some steps to subclasses. It lets one
 * redefine certain steps of an algorithm without changing the algorithm's structure
 */

require "vendor/autoload.php";

echo "Sub Turkey: ".PHP_EOL;
(new \App\TurkeySub())->make();

echo PHP_EOL."Sub Veggie: ".PHP_EOL;
(new \App\VeggieSub())->make();