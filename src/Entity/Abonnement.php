<?php


namespace App\Entity;

use App\Repository\AbonnementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnementphp bin/console make:entity --regenerate
 *
 * @ORM\Table(name="abonnement", indexes={@ORM\Index(name="nbvx", columns={"ID_Club"}), @ORM\Index(name="oiuli", columns={"id"})})
 * @ORM\Entity(repositoryClass=AbonnementRepository::class)
 */
class Abonnement
{
    /**
     *
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;

    /**
     *
     *
     * @ORM\ManyToOne(targetEntity="Abonnement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_Club", referencedColumnName="id")
     * })
     */
    private $idClub;

    /**
     *
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_User", referencedColumnName="id")
     * })
     */
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdClub(): ?self
    {
        return $this->idClub;
    }


    public function setClub(?Club $Club): self
    {
        $this->Club = $Club;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }


}
