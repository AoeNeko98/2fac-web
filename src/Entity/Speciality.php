<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Speciality
 *
 * @ORM\Table(name="speciality", indexes={@ORM\Index(name="SAH", columns={"ID_Etb"})})
 * @ORM\Entity
 */
class Speciality
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_Etb", type="integer", nullable=true)
     */
    private $idEtb;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom_Sp", type="string", length=50, nullable=true)
     */
    private $nomSp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Discription", type="string", length=500, nullable=true)
     */
    private $discription;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_SPEC", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSpec;

    public function getIdEtb(): ?int
    {
        return $this->idEtb;
    }

    public function setIdEtb(?int $idEtb): self
    {
        $this->idEtb = $idEtb;

        return $this;
    }

    public function getNomSp(): ?string
    {
        return $this->nomSp;
    }

    public function setNomSp(?string $nomSp): self
    {
        $this->nomSp = $nomSp;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(?string $discription): self
    {
        $this->discription = $discription;

        return $this;
    }

    public function getIdSpec(): ?int
    {
        return $this->idSpec;
    }


}
