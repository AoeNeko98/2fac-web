<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity(repositoryClass=EtablissementRepository::class)
 */
class Etablissement
{

    /**
     * @var int
     *
     * @ORM\Column(name="ID_Etab", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEtab;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Adress", type="string", length=100, nullable=false)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="Discription", type="string", length=300, nullable=false)
     */
    private $discription;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(name="Num", type="integer", nullable=false)
     */
    private $num;

    /**
     * @var int
     *
     * @ORM\Column(name="Etat", type="integer", nullable=false)
     */
    private $etat = '0';

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=true)
     */
    private $lat;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lg", type="float", precision=10, scale=0, nullable=true)
     */
    private $lg;

    /**
     * Etablissement constructor.
     */
    public function __construct()
    {
    }

    public function setIdEtab(int $idetab): self
    {
        $this->idEtab=$idetab;
            return $this;
    }


    public function getIdEtab(): ?int
    {
        return $this->idEtab;
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(string $discription): self
    {
        $this->discription = $discription;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(int $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLg(): ?float
    {
        return $this->lg;
    }

    public function setLg(?float $lg): self
    {
        $this->lg = $lg;

        return $this;
    }


}
