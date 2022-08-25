<?php

namespace controllers;

use models\Utilisateurs;
use source\renderer;

class homeController {
    public function index() {
        $pdo = new Utilisateurs(); //on instancie user 
        $users = $pdo ->All(); //on fait une requete avec la methode query de la classe pdo
        return renderer::make("index", compact('users')); //on crée une instance d'index
    }
}