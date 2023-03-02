<?php


class PrijavaController  extends Controller //ovim postižemo pozivanje view iz controllera
{


    public function autorizacija()
    {
        if(!isset($_POST['email'])||
        strlen(trim($_POST['email']))==0)
        {
            $this->view->render('prijava', [
                'poruka'=>'Obavezan unos email-a',
                'email'=>''
            ]);
            return;
           
        }
            if(!isset($_POST['password'])
            || strlen(trim($_POST['password']))==0){
                $this->view->render('prijava', [
                    'poruka'=>'Obavezna lozinka',
                    'email'=>$_POST['email']
                ]);
                    return;
            }

            //ovdje sigurno imam email i lozinka



    }
} 