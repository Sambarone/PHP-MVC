<?php

class App{

    //ova metoda ima zadatak saznati što želiš i to pokrenuti

    public static function start(){
       // echo '<pre>';
      //  print_r($_SERVER);
       // echo '</pre>';

       $ruta=Request::getRuta();

      // Log::info($ruta);

       $dijelovi=explode('/',substr($ruta,1)); //rastvaranje rute

      // Log::info($dijelovi);

       //idemo razaznati controler
       $controller='Index';

       if(!isset($dijelovi[0])|| $dijelovi[0]===''){
        $controller='IndexController';
       }
       else{
        $controller=ucfirst($dijelovi[0]).'Controller';
       }
      // Log::info($controller);

       //idemo razaznati controler
       $metoda='index';
       if(!isset($dijelovi[1])||$dijelovi[1]===''){
        $metoda='index';
       }
       else {
       $metoda=$dijelovi[1];
       }

       // Log::info($metoda);

       if(!(class_exists($controller)&& method_exists($controller,$metoda))){
        
        echo 'ne postoji niti postoji '.$controller. '-&gt;'.$metoda;
      return;
    }
       
       //izvedi ju
       $instanca=new $controller();
       $instanca->$metoda();
    }
    public static function config($kljuc){
        $configFile=BP_APP.'konfiguracija.php';

        if(!file_exists($configFile)){
            return 'Konfiguracijska datoteka ne postoji';
        }
        $config=require $configFile;

        if(!isset($config[$kljuc])){
            return 'kljuc'. $kljuc . 'nije postavljen u konfiguraciji';
        }
        return $config[$kljuc];
    }
}