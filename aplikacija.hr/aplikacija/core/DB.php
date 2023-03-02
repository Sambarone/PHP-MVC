<?php

// https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php


class DB extends PDO
{

private static $instanca=null;

private function __construct()
{
    extract(App::config('baza'));

    parent::__construct($dsn,$user,$password);

    $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //da mi dohvaća objekte


}


public static function getInstance()
{
    if(self::$instanca==null){
        self::$instanca=new self();
    }

    return self::$instanca;
}

}