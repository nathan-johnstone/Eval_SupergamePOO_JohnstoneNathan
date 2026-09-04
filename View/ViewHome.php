<?php

namespace View;

class ViewHome extends View
{
    //ATTRIBUTS
    private string $message = '';
    private array $datas = [];

    //CONSTRUCT

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getDatas(): array
    {
        return $this->datas;
    }

    public function setDatas(array $newDatas): self
    {
        $this->datas = $newDatas;
        return $this;
    }

    //GET & SET

    //METHODS
    public function displayMain(): self
    {
        ob_start();
?>
        <main class="container">
            <h2>Ajouter un joueur</h2>
            <form method="post" action="">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo">
                <label for="score">Score</label>
                <input type="text" id="score" name="score">
                <label for="team">Equipe</label>
                <select id="team" name="team">
                    <option value="1">Aucune</option>
                    <option value="2">TeamRocket</option>
                    <option value="3">DreamTeam</option>
                </select>
                <input type="submit" name="envoyer" value="envoyer">
            </form>
            <p><?= $this->message ?></p>
            <h2>Liste des joueurs</h2>
            <ul>
                <?php
                foreach ($this->getDatas() as $row) {
                ?>
                    <li><b>Pseudo :</b> <?= $row['pseudo'] ?> - <b>Score :</b> <?= $row['score'] ?> - <b>Equipe :</b> <?= $row['team'] ?></li>
                <?php
                }
                ?>
            </ul>
        </main>
<?php
        ob_end_flush();
        return $this;
    }

    public function displayAll()
    {
        $this->displayHeader();
        $this->displayMain();
        $this->displayFooter();
    }
}
