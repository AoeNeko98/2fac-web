<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Speciality
 *
 * @ORM\Table(name="speciality", indexes={@ORM\Index(name="SAH", columns={"ID_Etb"})})
 * @ORM\Entity
 */
class Speciality
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_Etb", type="integer", nullable=true)
     */
    private $idEtb;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom_Sp", type="string", length=50, nullable=true)
     */
    private $nomSp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Discription", type="string", length=500, nullable=true)
     */
    private $discription;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_SPEC", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSpec;


}
