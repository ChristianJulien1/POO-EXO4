<?php

class Stagiaire {
    private $nom;
    private $moyenne;

    public function __construct(string $nom, float $moyenne) {
        $this->nom = $nom;
        $this->moyenne = $moyenne;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getMoyenne(): float {
        return $this->moyenne;
    }

    public function setMoyenne(float $moyenne): void {
        $this->moyenne = $moyenne;
    }
}

class Formation {
    private $intitule;
    private $nbrJours;
    private $stagiaires;

    public function __construct(string $intitule, int $nbrJours, array $stagiaires) {
        $this->intitule = $intitule;
        $this->nbrJours = $nbrJours;
        $this->stagiaires = $stagiaires;
    }

    public function getIntitule(): string {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): void {
        $this->intitule = $intitule;
    }

    public function getNbrJours(): int {
        return $this->nbrJours;
    }

    public function setNbrJours(int $nbrJours): void {
        $this->nbrJours = $nbrJours;
    }

    public function getStagiaires(): array {
        return $this->stagiaires;
    }

    public function setStagiaires(array $stagiaires): void {
        $this->stagiaires = $stagiaires;
    }

    public function calculerMoyenneFormation(): float {
        $totalMoyenne = 0;
        $count = count($this->stagiaires);

        foreach ($this->stagiaires as $stagiaire) {
            $totalMoyenne += $stagiaire->getMoyenne();
        }

        return $totalMoyenne / $count;
    }

    public function getIndexMax(): int {
        $maxMoyenne = -1;
        $indexMax = -1;
        $count = count($this->stagiaires);

        for ($i = 0; $i < $count; $i++) {
            if ($this->stagiaires[$i]->getMoyenne() > $maxMoyenne) {
                $maxMoyenne = $this->stagiaires[$i]->getMoyenne();
                $indexMax = $i;
            }
        }

        return $indexMax;
    }

    public function afficherNomMax(): void {
        $indexMax = $this->getIndexMax();

        if ($indexMax != -1) {
            echo "Nom du premier stagiaire ayant la meilleure moyenne : " . $this->stagiaires[$indexMax]->getNom() . "\n";
        } else {
            echo "Aucun stagiaire trouvé.\n";
        }
    }

    public function afficherMinMax(): void {
        $indexMax = $this->getIndexMax();

        if ($indexMax != -1) {
            $minMoyenne = $this->stagiaires[$indexMax]->getMoyenne();

            foreach ($this->stagiaires as $stagiaire) {
                if ($stagiaire->getMoyenne() < $minMoyenne) {
                    $minMoyenne = $stagiaire->getMoyenne();
                }
            }

            echo "Note minimale du premier stagiaire ayant la meilleure moyenne : " . $minMoyenne . "\n";
        } else {
            echo "Aucun stagiaire trouvé.\n";
        }
    }

    public function trouverMoyenneParNom(string $nom): void {
        foreach ($this->stagiaires as $stagiaire) {
            if ($stagiaire->getNom() === $nom) {
                echo "Moyenne du stagiaire " . $nom . " : " . $stagiaire->getMoyenne() . "\n";
                return;
            }
        }

        echo "Aucun stagiaire trouvé avec le nom : " . $nom . "\n";
    }
}

?>
