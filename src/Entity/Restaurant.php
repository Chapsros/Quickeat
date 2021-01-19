<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 */
class Restaurant
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
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="Restaurant")
     */
    private $Commandes;

    /**
     * @ORM\OneToMany(targetEntity=Plat::class, mappedBy="Restaurant")
     */
    private $plats;

    /**
     * @ORM\OneToOne(targetEntity=Localisation::class, cascade={"persist", "remove"})
     */
    private $Localisation;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="Restaurant")
     */
    private $pictures;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="restaurants")
     */
    private $user;

    public function __construct()
    {
        $this->Commandes = new ArrayCollection();
        $this->plats = new ArrayCollection();
        $this->pictures = new ArrayCollection();
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

    public function getCategories(): ?string
    {
        return $this->categories;
    }

    public function setCategories(string $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->Commandes;
    }

    public function addCommande(Commande $Commande): self
    {
        if (!$this->Commandes->contains($Commande)) {
            $this->Commandes[] = $Commande;
            $Commande->setRestaurant($this);
        }

        return $this;
    }

    public function removeCommande(Commande $Commande): self
    {
        if ($this->Commandes->removeElement($Commande)) {
            // set the owning side to null (unless already changed)
            if ($Commande->getRestaurant() === $this) {
                $Commande->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Plat[]
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Plat $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats[] = $plat;
            $plat->setRestaurant($this);
        }

        return $this;
    }

    public function removePlat(Plat $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getRestaurant() === $this) {
                $plat->setRestaurant(null);
            }
        }

        return $this;
    }

    public function getLocalisation(): ?Localisation
    {
        return $this->Localisation;
    }

    public function setLocalisation(?Localisation $Localisation): self
    {
        $this->Localisation = $Localisation;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setRestaurant($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getRestaurant() === $this) {
                $picture->setRestaurant(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
