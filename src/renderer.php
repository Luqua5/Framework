<?php 

namespace source;

class renderer {
    public function __construct(private string $file, private ?array $params){} //file est le fichier qu'on va ouvrir et params c'est les variables qu'on récups dans la bdd

    public function render() { //on va utiliser cette fonction dans le ToString 
        ob_start(); // ça met tout ce qui se passe entre start et clean dans une variable tampon

        extract($this -> params);

        require PATH_VIEWS . $this->file . ".php"; //le require va permettre d'inclure tout ce qui se passe dans le fichier quand on va lancer index.php
        
        return ob_get_clean(); // là on ferme le buffer et on return tout ce qui s'est passé dans le tampon
    }

    public static function make (string $file, ?array $params):static {
        return new self($file, $params); //méthode qui sert a faire une instance de renderer 
    }

    public function __toString(){//toString determine comment l'objet doit régir quand il est traiter comme une chaine de caractère (on fait un return dans homeController)
        return $this->render(); //ici on lui demande d'appeler la méthode render
    }
}