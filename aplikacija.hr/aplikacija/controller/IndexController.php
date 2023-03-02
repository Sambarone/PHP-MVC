<?php

class IndexController extends Controller{

    public function index(){
   
        
        $this->view->render('index');
    }

    public function kontakt(){

        $this->view->render('kontakt');
    }

    public function prijava(){

        $this->view->render('prijava', [
            'poruka'=>'',
            'email'=>''
        ]);
    }

    public function proba(){

        $this->view->render('proba1');
    }

    public function odjava(){
        unset($_SESSION['auth']);
        session_destroy();
        header('location:'.App::config('url'));

        
    }
   

}