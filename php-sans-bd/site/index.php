<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>### TITRE ###</title>
    <meta name="author" content="### VOS NOMS ###">
    <meta name="description" content="### NOM DU PROJET ###">
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

    <?php
    $repertoire = new Scenario("Le Secret De Denderash","", Difficulte::Debutant);
/*    foreach ($repertoire->getScenarios() as $donnee) {*/
        ?>
        <div class='row' id="<?php echo "Expert"; ?>">
            <div class="col-md"> <?php echo $repertoire->getTitre(); ?> </div>
            <div class="col-md"> <?php echo $repertoire->getTitre(); ?> </div>
        </div>
<!--        --><?php /*} */?>
</div>

</body>

</html>
