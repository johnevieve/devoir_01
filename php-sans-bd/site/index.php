<?php

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>### EscapeGame ###</title>
    <meta name="author" content="### Genevieve Trudel ###">
    <meta name="description" content="### EXERCICE 1C ###">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js?v=1.0.0" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php
require("php/Endroit.php");
require("php/Scenario.php");
require("php/Repertoire.php");

use Cegep\Web4\GestionScenario\Endroit;
use Cegep\Web4\GestionScenario\Scenario;
use Cegep\Web4\GestionScenario\Repertoire;
use Cegep\Web4\GestionScenario\Difficulte;
?>

<div class="container" id="listeDonne">
    <a href="ajoutEndroit.php">Ajouter un endroit</a>
    <a href="ajoutScenario.php">Ajouter un scénario</a>
    <a href="logout.php">Déconnexion</a>
    <a href="login.php">Connexion</a>
    <?php
    $repertoire = new Repertoire();
    foreach ($repertoire->getScenarios() as $donnee) {
        ?>
        <div class='row' id="<?php echo $donnee->getDifficulte()->getLevel(); ?>">
            <div class="col-md"> <?php echo $donnee->getTitre(); ?> </div>
            <div class="col-md"> <?php echo $donnee->getEndroit(); ?> </div>
        </div>
<?php } ?>
</div>

</body>

</html>
