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

    public function getScoreeco(): ?float
    {
        return $this->scoreeco;
    }

    public function setScoreeco(float $scoreeco): self
    {
        $this->scoreeco = $scoreeco;

        return $this;
    }

    public function getScoreinfo(): ?float
    {
        return $this->scoreinfo;
    }

    public function setScoreinfo(float $scoreinfo): self
    {
        $this->scoreinfo = $scoreinfo;

        return $this;
    }

    public function getScorelet(): ?float
    {
        return $this->scorelet;
    }

    public function setScorelet(float $scorelet): self
    {
        $this->scorelet = $scorelet;

        return $this;
    }

    public function getScoremath(): ?float
    {
        return $this->scoremath;
    }

    public function setScoremath(float $scoremath): self
    {
        $this->scoremath = $scoremath;

        return $this;
    }

    public function getScoresc(): ?float
    {
        return $this->scoresc;
    }

    public function setScoresc(float $scoresc): self
    {
        $this->scoresc = $scoresc;

        return $this;
    }

    public function getScoresport(): ?float
    {
        return $this->scoresport;
    }

    public function setScoresport(float $scoresport): self
    {
        $this->scoresport = $scoresport;

        return $this;
    }

    public function getScoretech(): ?float
    {
        return $this->scoretech;
    }

    public function setScoretech(float $scoretech): self
    {
        $this->scoretech = $scoretech;

        return $this;
    }

    public function getIdSpc(): ?int
    {
        return $this->idSpc;
    }


}
