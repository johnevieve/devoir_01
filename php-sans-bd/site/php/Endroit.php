<?php

namespace Cegep\Web4\GestionScenario;

/** @var string Nom de l'endroit. */
class Endroit
{
    private string $nomEndroit;
    public function __construct($nomEndroit)
    {
        $this->$nomEndroit = $nomEndroit;
    }
}
?>
