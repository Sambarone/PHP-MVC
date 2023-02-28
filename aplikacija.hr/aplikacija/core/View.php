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

    public function render($phtmlStranica,$parametri=[])
    {
        $viewDatoteka=BP_APP.'view'.
        DIRECTORY_SEPARATOR . $phtmlStranica.'.phtml';
        ob_start(); //ne šaljemo klijentu podatke, output callback // stavlja u cash
        extract($parametri); //od ključeva kreira varijablu, i pridružuje im vrijednost
        //prvo se izvede mali unutarnji dio a onda se uglavi u predložak
            if(file_exists($viewDatoteka)){
                include_once $viewDatoteka;
            }
            else {
                include_once BP_APP.'view'.
                DIRECTORY_SEPARATOR . 'erorViewDatoteka.phtml';
            }
            $sadrzaj=ob_get_clean(); //sve iz keša stavlja u sadržaj
            include_once BP_APP . 'view' . DIRECTORY_SEPARATOR 
            . $this->predlozak . '.phtml';
    }

}