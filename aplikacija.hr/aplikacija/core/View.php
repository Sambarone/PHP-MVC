<?php

class View 
{
    private  $predlozak;

    public function __construct ($predlozak='predlozak')
    {
            $this->predlozak=$predlozak;
    }
    //kontroler kad je shvatio što želimo priprema sve silne podatke
    // i šalje ih na stranicu koju želi

    public function render($phtmlStranica,$paramteri=[])
    {
        $viewDatoteka=BP_APP.'view'.
        DIRECTORY_SEPARATOR . $phtmlStranica.'.phtml';
        ob_start(); //ne šaljemo klijentu podatke
        extract($paramteri); //od ključeva kreira varijablu, i pridružuje im vrijednost
            if(file_exists($viewDatoteka)){
                include_once $viewDatoteka;
            }
            else {
                include_once BP_APP.'view'.
                DIRECTORY_SEPARATOR . 'erorViewDatoteka.phtml';
            }
            $sadrzaj=ob_get_clean();
            include_once BP_APP . 'view' . DIRECTORY_SEPARATOR 
            . $this->predlozak . '.phtml';
    }

}