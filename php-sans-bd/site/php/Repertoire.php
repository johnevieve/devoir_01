<?php
namespace Cegep\Web4\GestionScenario;

/** @var Scenario[] Liste de scénarios. */
class Repertoire
{
    private $Scenarios;

    public function __construct()
    {
        $this->Scenarios = [];
    }

    public function getScenarios() : array
    {
        return $this->Scenarios;
    }

    public function setScenario($scenario)
    {
        $this->Scenarios[] = $scenario;
    }
}
?>
