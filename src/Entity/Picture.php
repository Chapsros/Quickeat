<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $namePicture;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="pictures")
     */
    private $Restaurant;

    /**
     * @ORM\ManyToOne(targetEntity=plat::class, inversedBy="pictures")
     */
    private $plat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePicture(): ?string
    {
        return $this->namePicture;
    }

    public function setNamePicture(?string $namePicture): self
    {
        $this->namePicture = $namePicture;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->Restaurant;
    }

    public function setRestaurant(?Restaurant $Restaurant): self
    {
        $this->Restaurant = $Restaurant;

        return $this;
    }

    public function getPlat(): ?plat
    {
        return $this->plat;
    }

    public function setPlat(?plat $plat): self
    {
        $this->plat = $plat;

        return $this;
    }
}
