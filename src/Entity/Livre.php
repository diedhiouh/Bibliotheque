<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ISBN;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nbr_pages;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_parution;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $image_livre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbr_exemplaire;

    /**
     * @ORM\ManyToOne(targetEntity=Auteur::class, inversedBy="livres")
     */
    private $id_auteur;

    /**
     * @ORM\ManyToMany(targetEntity=Domaine::class, inversedBy="livres")
     */
    private $categorie;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(?string $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(?string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNbrPages(): ?string
    {
        return $this->nbr_pages;
    }

    public function setNbrPages(string $nbr_pages): self
    {
        $this->nbr_pages = $nbr_pages;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->date_parution;
    }

    public function setDateParution(?\DateTimeInterface $date_parution): self
    {
        $this->date_parution = $date_parution;

        return $this;
    }

    public function getImageLivre()
    {
        return $this->image_livre;
    }

    public function setImageLivre($image_livre): self
    {
        $this->image_livre = $image_livre;

        return $this;
    }

    public function getNbrExemplaire(): ?int
    {
        return $this->nbr_exemplaire;
    }

    public function setNbrExemplaire(?int $nbr_exemplaire): self
    {
        $this->nbr_exemplaire = $nbr_exemplaire;

        return $this;
    }

    public function getIdAuteur(): ?Auteur
    {
        return $this->id_auteur;
    }

    public function setIdAuteur(?Auteur $id_auteur): self
    {
        $this->id_auteur = $id_auteur;

        return $this;
    }

    /**
     * @return Collection|Domaine[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Domaine $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(Domaine $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }
}
