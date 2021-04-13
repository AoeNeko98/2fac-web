<?php

namespace App\Entity;

use App\Repository\coursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours", uniqueConstraints={@ORM\UniqueConstraint(name="UC_Person", columns={"Nom"})}, indexes={@ORM\Index(name="qid_fk_idl", columns={"ID_Etab"}), @ORM\Index(name="hjgjkh", columns={"ID_SPEC"})})
 * @ORM\Entity(repositoryClass=coursRepository::class)
 */
class Cours
{
    /**
     * @var \Etablissement
     *
     * @ORM\ManyToOne(targetEntity="Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Etab", referencedColumnName="ID_Etab")
     * })
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
     * @var \Speciality
     *
     * @ORM\ManyToOne(targetEntity="Speciality")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_Spec", referencedColumnName="ID_SPEC")
     * })
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

    public function getIdEtab(): ?Etablissement
    {
        return $this->idEtab;
    }

    public function setIdEtab(?Etablissement $idEtab): self
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

    public function getIdSpec(): ?Speciality
    {
        return $this->idSpec;
    }

    public function setIdSpec(Speciality $idSpec): self
    {
        $this->idSpec = $idSpec;

        return $this;
    }

    public function getIdCours(): ?int
    {
        return $this->idCours;
    }


}
