<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix_quotidien = null;

    #[ORM\Column]
    private ?float $prix_mensuel = null;

    #[ORM\Column]
    private ?int $places = null;

    #[ORM\Column]
    private ?bool $is_manuelle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixQuotidien(): ?float
    {
        return $this->prix_quotidien;
    }

    public function setPrixQuotidien(float $prix_quotidien): static
    {
        $this->prix_quotidien = $prix_quotidien;

        return $this;
    }

    public function getPrixMensuel(): ?float
    {
        return $this->prix_mensuel;
    }

    public function setPrixMensuel(float $prix_mensuel): static
    {
        $this->prix_mensuel = $prix_mensuel;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function isManuelle(): ?bool
    {
        return $this->is_manuelle;
    }

    public function setIsManuelle(bool $is_manuelle): static
    {
        $this->is_manuelle = $is_manuelle;

        return $this;
    }
}
