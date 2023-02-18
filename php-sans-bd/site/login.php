<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$erreurs = [];
$usage = $_POST['usage'] ?? "";
$motPasse = $_POST['motPasse'] ?? "";

if (isset($_POST['submit'])) {
    if (empty($usage) or empty($motPasse)) {
        $erreurs[] = "Les informations de connextion ne sont pas valides.";
    }
    if (empty($erreurs)) {
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
<?php if (!empty($erreurs)): ?>
    <div class="erreur">
        <?php foreach ($erreurs as $erreur): ?>
            <?= $erreur; ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<form action="login.php" method="post">
    <label for="usage">Usage :</label><br>
    <input type="text" id="usage" name="usage" value="<?= $usage; ?>">
    <br>
    <label for="motPasse">Mot de passe:</label><br>
    <input type="password" id="motPasse :" name="motPasse" value="<?= $motPasse; ?>">

    <br><br>

    <input type="submit" name="submit" value="Envoyer">
</form>
</body>
</html>
