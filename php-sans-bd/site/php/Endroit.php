<?php

namespace Cegep\Web4\GestionScenario;

/** @var string Nom de l'endroit. */
class Endroit
{
    private string $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function getNomEndroit() : string
    {
        return $this->nom;
    }
}
?>
