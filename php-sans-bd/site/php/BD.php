<?php
namespace Cegep\Web4\GestionScenario;

use PDO;
use PDOException;

class BD
{

    public function __construct()
    {
    }

    public function connectionBD()
    {
        $host = 'db';
        $user = 'root';
        $password = 'root';
        $db = 'database';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            return $conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function setEndroit($endroit)
    {
        $conn = $this->connectionBD();

        $query = "INSERT INTO Endroit VALUES(NULL, '$endroit')";
        $result = $conn->query($query);
        if (!$result) {
            die($conn->error);
        }

        $conn = null;
    }

    public function getEndroitById($id)
    {
        $conn = $this->connectionBD();

        $query = "SELECT * FROM Endroit";
        $result = $conn->query($query);

        if (!$result) {
            die($conn->error);
        }
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row)
        {
            if($row['ID'] === $id)
            {
                return $row['Nom'];
            }
        }

    }

    public function getIdByEndroit($endroit)
    {
        $conn = $this->connectionBD();
        $query = "SELECT id FROM Endroit WHERE nom = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$endroit]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            die("No record found for the location '$endroit'");
        }
        $id = $row['id'];
        $conn = null;
        return $id;
    }

    public function getEndroits()
    {
        $conn = $this->connectionBD();

        $query = "SELECT * FROM Endroit";
        $result = $conn->query($query);

        if (!$result) {
            die($conn->error);
        }

        $endroits = [];
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row)
        {
            $endroits[] = new Endroit($row['Nom']);
        }

        return $endroits;
    }

    public function setScenario($titre, $nomEndroit, $difficulter)
    {
        $conn = $this->connectionBD();
        $idEndroit = $this->getIdByEndroit($nomEndroit);
        $query = "INSERT INTO Scenario VALUES(NULL, '$titre', '$idEndroit', '$difficulter')";
        $result = $conn->query($query);
        if (!$result) {
            die($conn->error);
        }
        $conn = null;
    }

    public function getRepertoire()
    {
        $repertoire = [];
        $conn = $this->connectionBD();

        $query = "SELECT * FROM Scenario";
        $result = $conn->query($query);

        if (!$result) {
            die($conn->error);
        }

        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row)
        {
            $difficulter =  match ($row['Difficulter']) {
                "Debutant" => Difficulte::Debutant,
                "Intermediaire" => Difficulte::Intermediaire,
                "Avance" => Difficulte::Avance,
                default => Difficulte::Avance,
            };

            $endroit = $this->getEndroitById($row['Endroit']);
            $repertoire[] = new Scenario($row['Titre'], $endroit, $difficulter);
        }

        return $repertoire;
    }

}
?>
