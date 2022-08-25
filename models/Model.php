<?php

namespace models;

use source\constantes;


class Model {
    private static \pdo $pdo; //on crée une valeur dans laquelle on va mettre la classe pdo, on met \pdo pour dire qu'elle est de type pdo
    protected string $table;

    public function __construct(){ //on stock le pdo dans la viariable $pdo et on met les parametre pour qu'elle se connecte a la bdd
        try{
                static::$pdo = new \PDO('mysql:dbname='. constantes::DB_NAME .';host='. constantes::DB_HOST,constantes::DB_USER, constantes::DB_PW,
                [
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, //il va noux envoyer le resultat dans un objet
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION //il affiche des erreurs
                ]
            );
        } catch(\PDOException $e) {
            echo $e -> getMessage(); die();
        }

        $this -> table = explode("\\", get_class($this))[1]; //on prend directemenr le nom de la classe, plus besoin de le définir, on crée juste le fichier
        
    }



    public function all() : array{
        $statement = $this -> getPDO() -> query('SELECT * FROM ' . $this->table ); //requete grâce a la methode query de pdo
        return $statement -> fetchAll(); //$statement est un objet, la methode fetchall nous rend un tableau associatif
    }

    protected function getPDO(){  //methode pour retourner un objet pdo et faire des requete etc...
        return static::$pdo;
    }
}