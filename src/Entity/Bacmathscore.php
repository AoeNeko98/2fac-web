<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bacmathscore
 *
 * @ORM\Table(name="bacmathscore")
 * @ORM\Entity
 */
class Bacmathscore
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_Etab", type="integer", nullable=true)
     */
    private $idEtab;

    /**
     * @var float|null
     *
     * @ORM\Column(name="score1", type="float", precision=10, scale=0, nullable=true)
     */
    private $score1;

    /**
     * @var float|null
     *
     * @ORM\Column(name="score2", type="float", precision=10, scale=0, nullable=true)
     */
    private $score2;

    /**
     * @var float|null
     *
     * @ORM\Column(name="score3", type="float", precision=10, scale=0, nullable=true)
     */
    private $score3;

    /**
     * @var float|null
     *
     * @ORM\Column(name="score4", type="float", precision=10, scale=0, nullable=true)
     */
    private $score4;

    /**
     * @var float|null
     *
     * @ORM\Column(name="score5", type="float", precision=10, scale=0, nullable=true)
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
