<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours", uniqueConstraints={@ORM\UniqueConstraint(name="UC_Person", columns={"Nom"})}, indexes={@ORM\Index(name="qid_fk_idl", columns={"ID_Etab"}), @ORM\Index(name="hjgjkh", columns={"ID_SPEC"})})
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_Etab", type="integer", nullable=true)
     */
    private $idEtab;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom", type="string", length=50, nullable=true)
     */
    private $nom;

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
     */
    private $idSpec;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_Cours", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCours;

    public function getIdEtab(): ?int
    {
        return $this->idEtab;
    }

    public function setIdEtab(?int $idEtab): self
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

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

    public function setIdSpec(int $idSpec): self
    {
        $this->idSpec = $idSpec;

        return $this;
    }

    public function getIdCours(): ?int
    {
        return $this->idCours;
    }


}
