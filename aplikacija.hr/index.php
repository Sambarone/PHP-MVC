<?php

//prvo je potrebno učuitati autloading
//ova datoteka će definirati temeljne preduvjete

//konstanta
define('BP', __DIR__.DIRECTORY_SEPARATOR);
define('BP_APP', BP.'aplikacija'.DIRECTORY_SEPARATOR);

$zaAutoLoad=[
    BP_APP.'controller',
    BP_APP.'core',
    BP_APP.'model'
]; //view ne ide u autoload, u njemu se php datoteke

$putanje=implode(PATH_SEPARATOR,$zaAutoLoad);

set_include_path($putanje);

//autoload ne učitava atomatski sve klase
//nego kad mu pošaljemo upit, on traži i ako nađe
//klasu onda ju učita

spl_autoload_register(function($klasa){
      //  echo 'u spl autoload, trazim klasu '.$klasa. '<br>';
        $putanje=explode(PATH_SEPARATOR,get_include_path());
        foreach ($putanje as $putanja){
          //  echo $putanja. '<br>';
            $datoteka=$putanja.DIRECTORY_SEPARATOR.
            $klasa.'.php';
           // echo $datoteka, '<br>';
        if(file_exists($datoteka)){
            require_once $datoteka;
            break;
        }
        }
});
App::start();
// $o=new Osoba();
//echo $o->getIme();