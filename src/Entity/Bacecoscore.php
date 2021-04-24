<?php

namespace App\Entity;

use App\Repository\BacecoscoreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bacecoscore
 *
 * @ORM\Table(name="bacecoscore")
 * @ORM\Entity(repositoryClass=bacecoscoreRepository::class)
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

    public function getIdEtab(): ?int
    {
        return $this->idEtab;
    }

    public function setIdEtab(int $idEtab): self
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    public function getScore1(): ?string
    {
        return $this->score1;
    }

    public function setScore1(string $score1): self
    {
        $this->score1 = $score1;

        return $this;
    }

    public function getScore2(): ?string
    {
        return $this->score2;
    }

    public function setScore2(string $score2): self
    {
        $this->score2 = $score2;

        return $this;
    }

    public function getScore3(): ?string
    {
        return $this->score3;
    }

    public function setScore3(string $score3): self
    {
        $this->score3 = $score3;

        return $this;
    }

    public function getScore4(): ?string
    {
        return $this->score4;
    }

    public function setScore4(string $score4): self
    {
        $this->score4 = $score4;

        return $this;
    }

    public function getScore5(): ?string
    {
        return $this->score5;
    }

    public function setScore5(string $score5): self
    {
        $this->score5 = $score5;

        return $this;
    }

    public function getIdSpec(): ?int
    {
        return $this->idSpec;
    }


}
