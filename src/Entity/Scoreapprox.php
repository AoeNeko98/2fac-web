<?php

namespace App\Entity;

use App\Repository\ScoreapproxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScoreapproxRepository::class)
 */
class Scoreapprox
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $ScoreECO;

    /**
     * @ORM\Column(type="float")
     */
    private $ScoreINFO;

    /**
     * @ORM\Column(type="float")
     */
    private $ScoreLET;

    /**
     * @ORM\Column(type="float")
     */
    private $ScoreMATH;

    /**
     * @ORM\Column(type="float")
     */
    private $ScoreSc;

    /**
     * @ORM\Column(type="float")
     */
    private $ScoreSPORT;

    /**
     * @ORM\Column(type="float")
     */
    private $ScoreTECH;

    /**
     * @ORM\ManyToOne(targetEntity=Speciality::class, inversedBy="scoreapproxes")
     */
    public $Speciality;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreECO(): ?float
    {
        return $this->ScoreECO;
    }

    public function setScoreECO(float $ScoreECO): self
    {
        $this->ScoreECO = $ScoreECO;

        return $this;
    }

    public function getScoreINFO(): ?float
    {
        return $this->ScoreINFO;
    }

    public function setScoreINFO(float $ScoreINFO): self
    {
        $this->ScoreINFO = $ScoreINFO;

        return $this;
    }

    public function getScoreLET(): ?float
    {
        return $this->ScoreLET;
    }

    public function setScoreLET(float $ScoreLET): self
    {
        $this->ScoreLET = $ScoreLET;

        return $this;
    }

    public function getScoreMATH(): ?float
    {
        return $this->ScoreMATH;
    }

    public function setScoreMATH(float $ScoreMATH): self
    {
        $this->ScoreMATH = $ScoreMATH;

        return $this;
    }

    public function getScoreSc(): ?float
    {
        return $this->ScoreSc;
    }

    public function setScoreSc(float $ScoreSc): self
    {
        $this->ScoreSc = $ScoreSc;

        return $this;
    }

    public function getScoreSPORT(): ?float
    {
        return $this->ScoreSPORT;
    }

    public function setScoreSPORT(float $ScoreSPORT): self
    {
        $this->ScoreSPORT = $ScoreSPORT;

        return $this;
    }

    public function getScoreTECH(): ?float
    {
        return $this->ScoreTECH;
    }

    public function setScoreTECH(float $ScoreTECH): self
    {
        $this->ScoreTECH = $ScoreTECH;

        return $this;
    }

    public function getSpeciality(): ?speciality
    {
        return $this->Speciality;
    }

    public function setSpeciality(?speciality $Speciality): self
    {
        $this->Speciality = $Speciality;

        return $this;
    }
}
