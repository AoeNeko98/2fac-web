<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EleveRepository;
/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_User", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var float|null
     *
     * @ORM\Column(name="score", type="float", precision=10, scale=0, nullable=true)
     */
    private $score;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Bac_Type", type="string", length=30, nullable=true)
     */
    private $bacType;

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getBacType(): ?string
    {
        return $this->bacType;
    }

    public function setBacType(?string $bacType): self
    {
        $this->bacType = $bacType;

        return $this;
    }


}
