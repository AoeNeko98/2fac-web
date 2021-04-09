<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bacecoscore
 *
 * @ORM\Table(name="bacecoscore")
 * @ORM\Entity
 */
class Bacecoscore
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Etab", type="integer", nullable=false)
     */
    private $idEtab;

    /**
     * @var string
     *
     * @ORM\Column(name="score1", type="string", length=5, nullable=false)
     */
    private $score1;

    /**
     * @var string
     *
     * @ORM\Column(name="score2", type="string", length=5, nullable=false)
     */
    private $score2;

    /**
     * @var string
     *
     * @ORM\Column(name="score3", type="string", length=5, nullable=false)
     */
    private $score3;

    /**
     * @var string
     *
     * @ORM\Column(name="score4", type="string", length=5, nullable=false)
     */
    private $score4;

    /**
     * @var string
     *
     * @ORM\Column(name="score5", type="string", length=5, nullable=false)
     */
    private $score5;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_SPEC", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSpec;


}
