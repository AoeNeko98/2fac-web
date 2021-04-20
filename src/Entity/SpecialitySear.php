<?php

namespace App\Entity;

use App\Repository\SpecialitySearRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialitySearRepository::class)
 */
class SpecialitySear
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
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class)
     */
    private $etab;

    /**
     * SpecialitySear constructor.
     */
    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEtab()
    {
        return $this->etab;
    }

    /**
     * @param mixed $etab
     */
    public function setEtab($etab): void
    {
        $this->etab = $etab;
    }



}
