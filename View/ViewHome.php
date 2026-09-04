<?php
namespace View;
Class ViewHome{
    //ATTRIBUTS

    //CONSTRUCT

    //GET & SET

    //METHODS
    public function displayMain(): self{
        ob_start();
?>
        <main>
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
        </main>
<?php
        ob_end_flush();
        return $this;
    }

    public function displayAll(){
        displayHeader();
        displayMain();
        displayFooter();
    }
}