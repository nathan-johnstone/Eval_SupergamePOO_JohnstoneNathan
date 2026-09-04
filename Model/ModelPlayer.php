<?php
namespace Model;
use PDO, EXCEPTION;
Class ModelPlayer extends Model{
    //ATTRIBUTS
    private int $id;
    private string $pseudo;
    private int $score;
    private string $team;
    private int $idTeam;
    
    //CONSTRUCT

    //GET & SET
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $newId):self{
        $this->id= $newId;
        return $this;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $newPseudo):self{
        $this->pseudo= $newPseudo;
        return $this;
    }

    public function getScore(): string
    {
        return $this->score;
    }

    public function setScore(string $newScore):self{
        $this->score= $newScore;
        return $this;
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function setTeam(string $newTeam):self{
        $this->team= $newTeam;
        return $this;
    }

    public function getIdTeam(): string
    {
        return $this->pseudo;
    }

    public function setIdTeam(string $newIdTeam):self{
        $this->idTeam= $newIdTeam;
        return $this;
    }

    //METHODS
    public function findAll(): array{
        try{
            $req = $this->getBDD()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON t.id_team = p.id_team ORDER BY p.pseudo');
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
        try{
            $req = $this->getBDD()->prepare('UPDATE player SET pseudo = ?, score = ?, idTeam = ? WHERE id = ?');
            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->score,PDO::PARAM_INT);
            $req->bindParam(3,$this->idTeam,PDO::PARAM_INT);
            $req->bindParam(3,$this->id,PDO::PARAM_INT);
            $req->execute();
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }
}