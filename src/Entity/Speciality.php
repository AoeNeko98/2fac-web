<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialityRepository::class)
 */
class Speciality
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
    private $Nom_Sp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Discription;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="specialities")
     */
    private $Etablissement;

    /**
     * @ORM\OneToMany(targetEntity=Scoreapprox::class, mappedBy="Speciality")
     */
    public $scoreapproxes;

    public function __construct()
    {
        $this->scoreapproxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSp(): ?string
    {
        return $this->Nom_Sp;
    }

    public function setNomSp(string $Nom_Sp): self
    {
        $this->Nom_Sp = $Nom_Sp;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->Discription;
    }

    public function setDiscription(string $Discription): self
    {
        $this->Discription = $Discription;

        return $this;
    }

    public function getEtablissement(): ?etablissement
    {
        return $this->Etablissement;
    }

    public function setEtablissement(?etablissement $Etablissement): self
    {
        $this->Etablissement = $Etablissement;

        return $this;
    }

    /**
     * @return Collection|Scoreapprox[]
     */
    public function getScoreapproxes(): Collection
    {
        return $this->scoreapproxes;
    }

    public function addScoreapprox(Scoreapprox $scoreapprox): self
    {
        if (!$this->scoreapproxes->contains($scoreapprox)) {
            $this->scoreapproxes[] = $scoreapprox;
            $scoreapprox->setSpeciality($this);
        }

        return $this;
    }

    public function removeScoreapprox(Scoreapprox $scoreapprox): self
    {
        if ($this->scoreapproxes->removeElement($scoreapprox)) {
            // set the owning side to null (unless already changed)
            if ($scoreapprox->getSpeciality() === $this) {
                $scoreapprox->setSpeciality(null);
            }
        }

        return $this;
    }
}
