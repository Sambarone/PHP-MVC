<?php

class IndexController extends Controller{

    public function index(){
   
        
        $this->view->render('index', 
        ['iznos'=>12,
        'podaci'=>[4,5,6,7,8,7,4]
    ]);
    }

    public function kontakt(){

        $this->view->render('kontakt');
    }

    public function prijava(){

        $this->view->render('prijava');
    }

    public function proba(){

        $this->view->render('proba1');
    }
   

}