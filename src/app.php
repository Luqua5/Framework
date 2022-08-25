<?php

namespace source;

use exceptions\actionNotCallableExceptions;
use router\router;

class app {

    public function __construct(private router $router){} //on passe l'objet router qui a été instancier dans index

    public function run(){
        try{
            echo $this->router -> resolve($_SERVER['REQUEST_URI']); //on rentre l'url dans le resolve qui va vérifier si c'est bien dans le tableau
        
        } catch (actionNotCallableExceptions $e){ //si j'appelle le throw il envoie le message qui est dans actionnotcallableexceptions.php
            echo $e->getMessage().". L'erreur se trouve à la ligne ". $e ->getLine(). " dans le fichier: ". $e ->getFile();
        }
    }
}