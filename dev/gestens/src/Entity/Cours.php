<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Semestre = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ects = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $heureTP = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $heureTD = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $heureCM = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formation $formation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSemestre(): ?string
    {
        return $this->Semestre;
    }

    public function setSemestre(string $Semestre): static
    {
        $this->Semestre = $Semestre;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getEcts(): ?string
    {
        return $this->ects;
    }

    public function setEcts(?string $ects): static
    {
        $this->ects = $ects;

        return $this;
    }

    public function getHeureTP(): ?\DateTime
    {
        return $this->heureTP;
    }

    public function setHeureTP(?\DateTime $heureTP): static
    {
        $this->heureTP = $heureTP;

        return $this;
    }

    public function getHeureTD(): ?\DateTime
    {
        return $this->heureTD;
    }

    public function setHeureTD(?\DateTime $heureTD): static
    {
        $this->heureTD = $heureTD;

        return $this;
    }

    public function getHeureCM(): ?\DateTime
    {
        return $this->heureCM;
    }

    public function setHeureCM(?\DateTime $heureCM): static
    {
        $this->heureCM = $heureCM;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): static
    {
        $this->formation = $formation;

        return $this;
    }


}
