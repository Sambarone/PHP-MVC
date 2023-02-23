<?php

class Osoba {

    private $ime;
    public function __construct (){
        echo 'Hello from osoba konstruktor', '<br>';
        $this->ime='Pero';
    }

    public function getIme(){
        return $this->ime;
    }
}