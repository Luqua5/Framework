<?php
/*

Le but c'est que j'ai register qui permet de mettre des chemins de dans le tableau des ùroutes. Une fois que j'ai enregistrer 
mes chemin dedans resolve va regarder si mes chemins sont dans le tableau $routes. Si il y est il retourne le nom de la page,
si il n'y est pas il retourne l'erreur que j'ai faite avec le fichier actionNotCallableExcpetions.php


Donc on a RESOLVE qui lance le CONTROLLER DEMANDE, et le controller va lancer le RENDERER qui va rendre la vue associer
*/
use source\app;
use router\router;
use exceptions\actionNotCallableExceptions;
require '../vendor/autoload.php';
define('PATH_VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR); //contante qui est le chemin vers le dossier views


$router = new router();

$router -> register('/public/', ['controllers\homeController', 'index'] );//on stock les chemins qu'on veut mettre dans le routeur
$router -> register('/public/contact', ['controllers\contactController', 'contact'] );

(new app($router))->run(); //j'instancie app mais je la stock nul part, et j'appelle run(), dans app ya le try catch pour l'erreur et l'instanciation de resolve