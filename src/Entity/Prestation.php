<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PrestationRepository::class)]
class Prestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'float')]
    private $prix;

    #[ORM\Column(type: 'time')]
    private $duree;

    #[ORM\Column(type: 'array')]
    private $genre = [];

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getGenre(): ?array
    {
        return $this->genre;
    }

    public function setGenre(array $genre): self
    {
        $this->genre = $genre;

        return $this;
    }
}

// $builder->add('genre', EnumType::class, ['class' => Genre::class]);
