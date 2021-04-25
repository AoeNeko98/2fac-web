<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Book1
 *
 * @ORM\Table(name="book1", indexes={@ORM\Index(name="jnk", columns={"user"}), @ORM\Index(name="bhn", columns={"categorie"})})
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book1
{



    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**

     * @ORM\Column(name="nom", type="string", length=255,nullable=false)
     * @Assert\Length(min=3,max=255,minMessage="invalid name")
     * @Assert\NotBlank(message=" please insert a name")
     *
     */
    private $nom;

    /**
     * @Assert\NotBlank(message="please choose one")
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     *
     */
    private $type;

    /**
     *
     ** @Assert\Length(min=3,max=255,minMessage="invalid discription")
     * @Assert\NotBlank(message="please insert a discription")
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @Assert\NotBlank(message="please insert a price")
     * @Assert\Type(type="float",message="not a valid price")
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     *
     * @Assert\NotBlank(message="please choose an image")
     * @Assert\Length(min=1,max=255,minMessage="invalid discription")
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @Assert\Isbn(message="not a valid ISBN")
     * @Assert\NotBlank(message="please insert an ISBN")
     * @ORM\Column(name="isbn", type="string", length=255, nullable=false)
     */
    private $isbn;

    /**
     *
     * @Assert\NotBlank(message="please choose one")
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(value="categorie", referencedColumnName="id")
     */
    private $categorie;

    /**
     *
     *
     * @ORM\ManyToOne(targetEntity="User")
     *   @ORM\JoinColumn(name="user", referencedColumnName="ID_User")
     *
     */
    private $user;




    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }


    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }


    public function getType()
    {
        return $this->type;
    }


    public function setType(string $type): void
    {
        $this->type = $type;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage(string $image): void
    {
        $this->image = $image;
    }


    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }














}
