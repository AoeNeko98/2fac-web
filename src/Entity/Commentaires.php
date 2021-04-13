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

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param int|null $idUser
     */
    public function setIdUser(?int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string|null
     */
    public function getDatepubcom(): ?string
    {
        return $this->datepubcom;
    }

    /**
     * @param string|null $datepubcom
     */
    public function setDatepubcom(?string $datepubcom): void
    {
        $this->datepubcom = $datepubcom;
    }

    /**
     * @return string|null
     */
    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    /**
     * @param string|null $contenue
     */
    public function setContenue(?string $contenue): void
    {
        $this->contenue = $contenue;
    }

    /**
     * @return int
     */
    public function getIdComnt(): int
    {
        return $this->idComnt;
    }

    /**
     * @param int $idComnt
     */
    public function setIdComnt(int $idComnt): void
    {
        $this->idComnt = $idComnt;
    }

    /**
     * @return string
     */
    public function getEtat(): string
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat(string $etat): void
    {
        $this->etat = $etat;
    }

    /**
     * @return \Articles
     */
    public function getIdArt(): \Articles
    {
        return $this->idArt;
    }

    /**
     * @param \Articles $idArt
     */
    public function setIdArt(\Articles $idArt): void
    {
        $this->idArt = $idArt;
    }


}
