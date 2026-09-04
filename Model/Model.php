<?php

namespace Model;

use PDO;

class Model
{
    //ATTRIBUTS
    private PDO $bdd;

    //CONSTRUCT
    public function __construct()
    {
        $this->bdd = new PDO(
            'mysql:host=' . $_ENV['dbhost'] . ';dbname=' . $_ENV['dbname'],
            $_ENV['login'],
            $_ENV['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    //GET & SET
    public function getBDD(): PDO
    {
        return $this->bdd;
    }

    //METHODS

}
