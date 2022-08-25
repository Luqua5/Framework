<?php

namespace router;

use exceptions\actionNotCallableExceptions;
use source\renderer;
require __DIR__ . '/../vendor/autoload.php';


class router {

    public array $routes; 
    
    
    public function register (string $path, array $action):void { //sauvegarde une route
        $this->routes[$path] = $action; // met la route qu'on a entrer dans le tableau associatif $routes avec en clé le chemin et la valeur l'action dans l'url
    }

    public function resolve(string $url){ //regarde si la page sur laquelle on est, est dans les routes
       
        $path = explode('?', $url)[0];//sépare en 2 avec le "?" et on prend la première partie, ex: localhost/router/contact?info=fdfsfds, on prend que /router/contact
        $action = $this -> routes[$path] ?? null; //on stock le chemin dans $action si c'est definit et different de null sinon on stock null
        if(is_array($action)){
            [$className, $method] = $action; //on unpack $action et on met les valeurs respectivement dans $class et $method
            if(class_exists($className) && method_exists($className, $method)){ //on regarde si la classe et la methode existe
                $class= new $className(); //si ça existe on l'instancie
                return call_user_func_array([$class, $method], []); // dans le premier tableau on met la class et la methode a appeler et le 2e tableau c'est les potentiels parametres a mettre dans la methode    
            }
        }
        throw new actionNotCallableExceptions();
    }

    public function getRoute():array {
        return $this->routes;
    }
}