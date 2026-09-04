<?php

namespace Controller;

use Utils;

class ControllerHome extends Controller
{
    //ATTRIBUTS

    //CONSTRUCT

    //GET & SET

    //METHODS
    public function displayPlayers(): self
    {
        $datas = $this->getModel()->findAll();
        $this
            ->getView()
            ->setDatas($datas);
        return $this;
    }

    public function registerPlayer(): self
    {
        if (isset($_POST['envoyer'])) {

            if (empty($_POST['pseudo']) || empty($_POST['score']) || empty($_POST['team'])) {
                $this->getView()->setMessage('Veuillez remplir tous les champs.');
                return $this;
            }

            //Nettoyer les données
            $pseudo = Utils::sanitize($_POST['pseudo']);
            $score = Utils::sanitize($_POST['score']);
            $idTeam = Utils::sanitize($_POST['team']);

            //Je vais fournir au modèle ces données
            $this->getModel()->setPseudo($pseudo)->setScore($score)->setIdTeam($idTeam);

            //Vérifier si le pseudo est libre
            $data = $this->getModel()->findByPseudo();
            if ($data) {
                $this->getView()->setMessage("Ce pseudo n'est pas disponible.");
                return $this;
            }

            //Lancement de l'insertion en BDD
            $this->getModel()->add();

            $this->getView()->setMessage("Vous avez bien été enregistré.");

            return $this;
        }
        return $this;
    }
}
