<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating", indexes={@ORM\Index(name="OLJK", columns={"ID_Cours"}), @ORM\Index(name="HGJGKL", columns={"ID_USER"})})
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var float
     *
     * @ORM\Column(name="Rate", type="float", precision=10, scale=0, nullable=false)
     */
    private $rate;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_rate", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRate;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_Cours", type="integer", nullable=false)
     */
    private $idCours;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_USER", type="integer", nullable=false)
     */
    private $idUser;

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getIdRate(): ?int
    {
        return $this->idRate;
    }

    public function getIdCours(): ?int
    {
        return $this->idCours;
    }

    public function setIdCours(int $idCours): self
    {
        $this->idCours = $idCours;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
