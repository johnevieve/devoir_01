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
        $query = "SELECT ID FROM Endroit WHERE nom = $endroit";
        $result = $conn->query($query);
        if (!$result) {
            die($conn->error);
        }

        return $result['ID'];
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
        $query = "INSERT INTO Scenario VALUES(NULL, $titre, $idEndroit, $difficulter)";
        $result = $conn->query($query);
        if (!$result) {
            die($conn->error);
        }
        $conn = null;
    }

    public function getRepertoire()
    {
        $repertoire = new Repertoire();
        $conn = $this->connectionBD();

        $query = "SELECT * FROM donnees";
        $result = $conn->query($query);

        if (!$result) {
            die($conn->error);
        }

        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row)
        {
            echo $row['Titre'], $row['Endroit'], $row['Difficulter'];

        }

        return $repertoire;
    }

}
?>
