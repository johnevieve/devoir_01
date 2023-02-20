<?php
namespace Cegep\Web4\GestionScenario;

interface Level
{
    public function getLevel() : string;
}

enum Difficulte implements Level
{
    case Debutant;
    case Intermediaire;
    case Avance;
    case Expert;

    public function getLevel(): string
    {
        return match ($this) {
            Difficulte::Debutant => "Debutant",
            Difficulte::Intermediaire => "Intermediaire",
            Difficulte::Avance => "Avance",
            default => "Expert",
        };
    }
}

/** @var string Titre du scénario. */
/** @var Endroit Endroit qui offre le scénario. */
/** @var Difficulte Difficulté du scénario. */
class Scenario
{
    protected string $titre;
    protected Endroit $endroit;
    protected Difficulte $difficulte;

    public function __construct(string $titres, Endroit $endroit, Difficulte $difficulte)
    {
        $this->titre =$titres;
        $this->endroit = $endroit;
        $this->difficulte = $difficulte;
    }

    public function getTitre() : string
    {
        return $this->titre;
    }

    public function getEndroit()
    {
        return $this->endroit;
    }

    public function getDifficulte() : Difficulte
    {
        return $this->difficulte;
    }
}
?>
