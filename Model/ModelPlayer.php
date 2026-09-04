<?php
namespace Model;
use PDO, EXCEPTION;
Class ModelPlayer{
    //ATTRIBUTS
    private int $id;
    private string $pseudo;
    private int $score;
    private string $team;
    private int $idTeam;
    
    //CONSTRUCT

    //GET & SET

    //METHODS
    public function findAll(): array{
        try{
            $req = $this->getBDD()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON t.id_team = p.id_team');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function findByPseudo(): array | bool{
        try{
            $req = $this->getBDD()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON t.id_team = p.id_team WHERE p.pseudo = ?');
            $req->execute([$this->pseudo]);
            return $req->fetchAll(PDO::FETCH_ASSOC) ?? false;
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function add(): void{
        try{
            $req = $this->getBDD()->prepare('INSERT INTO player (pseudo, score, id_team) VALUES (?,?,?)');
            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->score,PDO::PARAM_INT);
            $req->bindParam(3,$this->idTeam,PDO::PARAM_INT);
            $req->execute();
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function delete(): void{
        try{
            $req = $this->getBDD()->prepare('DELETE FROM player WHERE id_player = ?');
            $req->bindParam(1,$this->id,PDO::PARAM_INT);
            $req->execute();
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function update(): void{
        
    }
}