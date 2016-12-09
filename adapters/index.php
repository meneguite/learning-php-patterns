<?php
/**
 * An adapter allows you to translate one interface for use with another
 */

require 'vendor/autoload.php';

use \App\Book;
use \App\BookInterface;
use \App\Kindle;

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

//(new Person())->read(new Book());

(new Person())->read(new \App\KindleAdapter(new Kindle()));