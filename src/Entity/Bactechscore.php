<?php

namespace App\Entity;

use App\Repository\bactechscoreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bactechscore
 *
 * @ORM\Table(name="bactechscore")
 * @ORM\Entity(repositoryClass=bactechscoreRepository::class)
 */
class Bactechscore
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

    public function getIdEtab(): ?int
    {
        return $this->idEtab;
    }

    public function setIdEtab(?int $idEtab): self
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    public function getScore1(): ?float
    {
        return $this->score1;
    }

    public function setScore1(?float $score1): self
    {
        $this->score1 = $score1;

        return $this;
    }

    public function getScore2(): ?float
    {
        return $this->score2;
    }

    public function setScore2(?float $score2): self
    {
        $this->score2 = $score2;

        return $this;
    }

    public function getScore3(): ?float
    {
        return $this->score3;
    }

    public function setScore3(?float $score3): self
    {
        $this->score3 = $score3;

        return $this;
    }

    public function getScore4(): ?float
    {
        return $this->score4;
    }

    public function setScore4(?float $score4): self
    {
        $this->score4 = $score4;

        return $this;
    }

    public function getScore5(): ?float
    {
        return $this->score5;
    }

    public function setScore5(?float $score5): self
    {
        $this->score5 = $score5;

        return $this;
    }

    public function getIdSpec(): ?int
    {
        return $this->idSpec;
    }


}
