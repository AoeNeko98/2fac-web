<?php


namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="qp_fk_idl", columns={"ID_Etab"})})
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
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
    private $idArt;

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

    public function getDatepub(): ?\DateTimeInterface
    {
        return $this->datepub;
    }

    public function setDatepub(?\DateTimeInterface $datepub): self
    {
        $this->datepub = $datepub;

        return $this;
    }

    public function getContenueArticle(): ?string
    {
        return $this->contenueArticle;
    }

    public function setContenueArticle(?string $contenueArticle): self
    {
        $this->contenueArticle = $contenueArticle;

        return $this;
    }

    public function getIdArt(): ?int
    {
        return $this->idArt;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getIdEtab(): ?Etablissement
    {
        return $this->idEtab;
    }

    public function setIdEtab(?Etablissement $idEtab): self
    {
        $this->idEtab = $idEtab;

        return $this;
    }


}
