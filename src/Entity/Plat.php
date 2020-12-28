<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlatRepository::class)
 */
class Plat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=commande::class, inversedBy="plats")
     */
    private $commande;

    /**
     * @ORM\ManyToOne(targetEntity=restaurant::class, inversedBy="plats")
     */
    private $restaurant;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCommande(): ?commande
    {
        return $this->commande;
    }

    public function setCommande(?commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getRestaurant(): ?restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }
}
