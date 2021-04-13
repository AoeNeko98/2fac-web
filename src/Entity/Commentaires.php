<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires", indexes={@ORM\Index(name="qcp_fk_idl", columns={"ID_art"})})
 * @ORM\Entity
 */
class Commentaires
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_User", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="datepubcom", type="string", length=30, nullable=true)
     */
    private $datepubcom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenue", type="string", length=500, nullable=true)
     */
    private $contenue;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_Comnt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComnt;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=1, nullable=false)
     */
    private $etat;

    /**
     * @var \Articles
     *
     * @ORM\ManyToOne(targetEntity="Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_art", referencedColumnName="ID_art")
     * })
     */
    private $idArt;

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getDatepubcom(): ?string
    {
        return $this->datepubcom;
    }

    public function setDatepubcom(?string $datepubcom): self
    {
        $this->datepubcom = $datepubcom;

        return $this;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(?string $contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getIdComnt(): ?int
    {
        return $this->idComnt;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdArt(): ?Articles
    {
        return $this->idArt;
    }

    public function setIdArt(?Articles $idArt): self
    {
        $this->idArt = $idArt;

        return $this;
    }


}
