<?php

namespace View;

class View
{
    //ATTRIBUTS

    //CONSTRUCT

    //GET & SET

    //METHODS
    public function displayHeader(): self
    {
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
            <title>Supergame</title>
        </head>

        <body>
        <?php
        ob_end_flush();
        return $this;
    }

    public function displayFooter(): self
    {
        ob_start();
        ?>
            <footer>

            </footer>
        </body>

        </html>
<?php
        ob_end_flush();
        return $this;
    }
}
