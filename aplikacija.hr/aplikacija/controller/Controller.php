<?php

abstract class Controller
{
protected $view;  //ovo vidi ova klasa i sve koje ju nasljede
public function __construct(){
    $this->view=new View();
}


}

