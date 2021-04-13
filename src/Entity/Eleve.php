<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity
 */
class Eleve
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_User", type="integer", nullable=false)
     * @ORM\Id
     *
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

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return float|null
     */
    public function getScore(): ?float
    {
        return $this->score;
    }

    /**
     * @param float|null $score
     */
    public function setScore(?float $score): void
    {
        $this->score = $score;
    }

    /**
     * @return string|null
     */
    public function getBacType(): ?string
    {
        return $this->bacType;
    }

    /**
     * @param string|null $bacType
     */
    public function setBacType(?string $bacType): void
    {
        $this->bacType = $bacType;
    }


}
