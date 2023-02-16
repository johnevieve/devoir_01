<?php
namespace Cegep\Web4\GestionScenario;

/** @var Scenario[] Liste de scénarios. */
class Repertoire
{
    private $Scenario;

    public function __construct()
    {
        $this->Scenario = [
            new Scenario("Le Secret De Denderash","", Difficulte::Debutant),
/*            new Scenario("L'équation","", Difficulte::Intermediaire),
            new Scenario("Vortex Passé","", Difficulte::Intermediaire),
            new Scenario("L'Examien Final","", Difficulte::Intermediaire),
            new Scenario("La Succession De John Jackson","", Difficulte::Avance),
            new Scenario("La Colère De Poséidon","", Difficulte::Avance),
            new Scenario("Le Weekeen De Rêve","", Difficulte::Intermediaire),
            new Scenario("Le Bar Clandestin","", Difficulte::Expert),
            new Scenario("Vortex Future","", Difficulte::Expert),
            new Scenario("La Jungle","", Difficulte::Intermediaire),
            new Scenario("A travers les étoiles","", Difficulte::Expert),
            new Scenario("Excalibur","", Difficulte::Avance),
            new Scenario("Funzy Couz","", Difficulte::Intermediaire),*/
        ];
    }

    public function getScenarios() : array
    {
        return $this->Scenario;
    }
}
?>
