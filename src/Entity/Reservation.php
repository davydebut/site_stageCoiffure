<?php

namespace App\Entity;
use App\Entity\Client;
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

    #[ORM\Column(type: 'string')]
    private $status;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_client;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'appointment')]
    #[ORM\JoinColumn(nullable: false)]
    private $pro;

    #[ORM\ManyToOne(targetEntity: Prestation::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private $prestation;

   

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->id_client;
    }

    public function setIdClient(?Client $id_client): self
    {
        $this->id_client = $id_client;

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

    public function getPrestation(): ?Prestation
    {
        return $this->prestation;
    }

    public function setPrestation(?Prestation $prestation): self
    {
        $this->prestation = $prestation;

        return $this;
    }
}
