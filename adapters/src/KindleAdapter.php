<?php
namespace App;


class KindleAdapter implements BookInterface
{

    /**
     * @var KindleInterface
     */
    private $kindle;

    public function __construct(KindleInterface $kindle)
    {
        $this->kindle = $kindle;
    }

    public function open()
    {
        $this->kindle->turnOn();
    }

    public function turnPage()
    {
        $this->kindle->pressNextButton();
    }
}