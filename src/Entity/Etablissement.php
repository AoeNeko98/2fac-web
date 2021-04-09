<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity
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
     * @ORM\Column(name="Discription", type="text", length=0, nullable=false)
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


}
