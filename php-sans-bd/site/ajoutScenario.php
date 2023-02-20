<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["usage"])) {
    header("Location: login.php");
    exit();
}
require("php/Endroit.php");
require("php/Scenario.php");
require("php/BD.php");

use Cegep\Web4\GestionScenario\BD;
use Cegep\Web4\GestionScenario\Difficulte;
use Cegep\Web4\GestionScenario\Endroit;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$erreurs = [];
$bd = new BD();
$titre = $_POST['titre'] ?? "";
$endroit = $_POST['endroit'] ?? "";
$difficulte = $_POST['difficulte'] ?? "";

if (isset($_POST['submit'])) {
    if (empty($titre)) {
        $erreurs[] = "Le champ ne peut être vide.";
    } elseif (strlen($titre) < 3 || strlen($titre) > 100) {
        $erreurs[] = "Entre 3 et 100 caracteres obligatoire";
    }

    foreach ($bd->getRepertoire() as $scenario) {
        if ($scenario->getTitre() === $titre) {
            foreach ($bd->getEndroits() as $nom) {
                if ($nom->getNomEndroit() === $endroit) {
                    $erreurs[] = "Scenario deja exitant";
                    break 2;
                }
            }
        }
    }

    if (empty($erreurs)) {
        $bd->setScenario($titre, $endroit, $difficulte);
        header("Location: index.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
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
</head
<body>
<a href="index.php">Retour</a>
<form action="ajoutScenario.php" method="post">
    <div class="form-group">
        <label for="titre">Nom:</label><br>
        <input class="form-control" type="text" id="titre" name="titre" value="<?= $titre; ?>">
    </div>
    <?php
    if (!empty($erreurs)): ?>
        <div class="erreur">
            <?php
            foreach ($erreurs as $erreur): ?>
                <?= $erreur; ?><br>
            <?php
            endforeach; ?>
        </div>
    <?php
    endif; ?>
    <br>
    <div class="form-group">
        <label for="endroit">Endroit:</label><br>
        <select class="form-control" id="endroit" name="endroit">
            <?php
            foreach ($bd->getEndroits() as $nomEndroit) {
                $nom = $nomEndroit->getNomEndroit();
                echo "<option value='$nom'>$nom</option>";
            }
            ?>
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="difficulte">Difficulte:</label><br>
        <select class="form-control" id="difficulte" name="difficulte">
            <?php
            foreach (Difficulte::cases() as $niveauDifficulter) {
                $nom = $niveauDifficulter->getLevel();
                echo "<option value='$nom'>$nom</option>";
            }
            ?>
        </select>
    </div>
    <br><br>
    <input type="submit" name="submit" value="Envoyer">
</form>
</body>
</html>
