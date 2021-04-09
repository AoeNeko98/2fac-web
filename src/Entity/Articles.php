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


}
