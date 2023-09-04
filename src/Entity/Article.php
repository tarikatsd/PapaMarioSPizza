<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $quantity = null;


    #[ORM\ManyToOne(inversedBy: 'article')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredientAdd = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredientRemoved = null;

    public function __toString(): string
    {
        return $this->nom;
        return $this->prix;
        return $this->quantity;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }
    
    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIngredientAdd(): ?string
    {
        return $this->ingredientAdd;
    }

    public function setIngredientAdd(?string $ingredientAdd): static
    {
        $this->ingredientAdd = $ingredientAdd;

        return $this;
    }

    public function getIngredientRemoved(): ?string
    {
        return $this->ingredientRemoved;
    }

    public function setIngredientRemoved(?string $ingredientRemoved): static
    {
        $this->ingredientRemoved = $ingredientRemoved;

        return $this;
    }
}
