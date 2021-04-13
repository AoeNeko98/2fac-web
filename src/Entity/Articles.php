<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="qp_fk_idl", columns={"ID_Etab"})})
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datepub", type="datetime", nullable=true)
     */
    private $datepub;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Contenue_Article", type="string", length=500, nullable=true)
     */
    private $contenueArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_art", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idArt;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=30, nullable=false)
     */
    private $titre;

    /**
     * @var \Etablissement
     *
     * @ORM\ManyToOne(targetEntity="Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_Etab", referencedColumnName="ID_Etab")
     * })
     */
    private $idEtab;

    /**
     * @return \DateTime|null
     */
    public function getDatepub(): ?\DateTime
    {
        return $this->datepub;
    }

    /**
     * @param \DateTime|null $datepub
     */
    public function setDatepub(?\DateTime $datepub): void
    {
        $this->datepub = $datepub;
    }

    /**
     * @return string|null
     */
    public function getContenueArticle(): ?string
    {
        return $this->contenueArticle;
    }

    /**
     * @param string|null $contenueArticle
     */
    public function setContenueArticle(?string $contenueArticle): void
    {
        $this->contenueArticle = $contenueArticle;
    }

    /**
     * @return int
     */
    public function getIdArt(): int
    {
        return $this->idArt;
    }

    /**
     * @param int $idArt
     */
    public function setIdArt(int $idArt): void
    {
        $this->idArt = $idArt;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return \Etablissement
     */
    public function getIdEtab(): \Etablissement
    {
        return $this->idEtab;
    }

    /**
     * @param \Etablissement $idEtab
     */
    public function setIdEtab(\Etablissement $idEtab): void
    {
        $this->idEtab = $idEtab;
    }


}
