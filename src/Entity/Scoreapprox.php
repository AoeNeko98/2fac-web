<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scoreapprox
 *
 * @ORM\Table(name="scoreapprox")
 * @ORM\Entity
 */
class Scoreapprox
{
    /**
     * @var float
     *
     * @ORM\Column(name="ScoreECO", type="float", precision=10, scale=0, nullable=false)
     */
    private $scoreeco;

    /**
     * @var float
     *
     * @ORM\Column(name="ScoreINFO", type="float", precision=10, scale=0, nullable=false)
     */
    private $scoreinfo;

    /**
     * @var float
     *
     * @ORM\Column(name="ScoreLET", type="float", precision=10, scale=0, nullable=false)
     */
    private $scorelet;

    /**
     * @var float
     *
     * @ORM\Column(name="ScoreMATH", type="float", precision=10, scale=0, nullable=false)
     */
    private $scoremath;

    /**
     * @var float
     *
     * @ORM\Column(name="ScoreSc", type="float", precision=10, scale=0, nullable=false)
     */
    private $scoresc;

    /**
     * @var float
     *
     * @ORM\Column(name="ScoreSPORT", type="float", precision=10, scale=0, nullable=false)
     */
    private $scoresport;

    /**
     * @var float
     *
     * @ORM\Column(name="ScoreTECH", type="float", precision=10, scale=0, nullable=false)
     */
    private $scoretech;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_SPC", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSpc;


}
