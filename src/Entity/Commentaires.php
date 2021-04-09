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


}
