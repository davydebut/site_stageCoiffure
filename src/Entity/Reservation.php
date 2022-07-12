<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $heure_de_rendez_vous;

    #[ORM\Column(type: 'array')]
    private $status = [];

    #[ORM\ManyToOne(targetEntity: client::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_client;

    #[ORM\ManyToOne(targetEntity: prestation::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private $prestation;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'appointment')]
    #[ORM\JoinColumn(nullable: false)]
    private $pro;

    public function __construct()
    {
        $this->prestation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDeRendezVous(): ?\DateTimeInterface
    {
        return $this->heure_de_rendez_vous;
    }

    public function setHeureDeRendezVous(\DateTimeInterface $heure_de_rendez_vous): self
    {
        $this->heure_de_rendez_vous = $heure_de_rendez_vous;

        return $this;
    }

    public function getStatus(): ?array
    {
        return $this->status;
    }

    public function setStatus(array $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIdClient(): ?client
    {
        return $this->id_client;
    }

    public function setIdClient(?client $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getPrestation(): ?prestation
    {
        return $this->prestation;
    }

    public function setPrestation(?prestation $prestation): self
    {
        $this->prestation = $prestation;

        return $this;
    }

    public function getPro(): ?Client
    {
        return $this->pro;
    }

    public function setPro(?Client $pro): self
    {
        $this->pro = $pro;

        return $this;
    }
}
