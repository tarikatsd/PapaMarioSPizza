<?php

namespace App\Entity;

use App\Repository\PromoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PromoRepository::class)]
#[Vich\Uploadable]
class Promo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isActive = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $imageName = null;

        // NOTE: This is not a mapped field of entity metadata, just a simple property.
        #[Vich\UploadableField(mapping: 'promo', fileNameProperty: 'imageName')]
        private ?File $imageFile = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToMany(targetEntity: Pizza::class)]
    private Collection $pizza;

    #[ORM\ManyToMany(targetEntity: Boisson::class)]
    private Collection $boisson;

    #[ORM\ManyToMany(targetEntity: Extra::class)]
    private Collection $extra;

    #[ORM\ManyToMany(targetEntity: Dessert::class)]
    private Collection $dessert;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $pizzaQuantity = null;

    #[ORM\Column(nullable: true)]
    private ?int $boissonQuantity = null;

    #[ORM\Column(nullable: true)]
    private ?int $dessertQuantity = null;

    #[ORM\Column(nullable: true)]
    private ?int $extraQuantity = null;

    #[ORM\ManyToMany(targetEntity: Canette::class, inversedBy: 'promos')]
    private Collection $canette;

    #[ORM\Column(nullable: true)]
    private ?int $canetteQuantity = null;



    public function __construct()
    {
        $this->pizza = new ArrayCollection();
        $this->boisson = new ArrayCollection();
        $this->extra = new ArrayCollection();
        $this->dessert = new ArrayCollection();
        $this->canette = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }

        /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
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

    /**
     * @return Collection<int, Pizza>
     */
    public function getPizza(): Collection
    {
        return $this->pizza;
    }

    public function addPizza(Pizza $pizza): static
    {
        if (!$this->pizza->contains($pizza)) {
            $this->pizza->add($pizza);
        }

        return $this;
    }

    public function removePizza(Pizza $pizza): static
    {
        $this->pizza->removeElement($pizza);

        return $this;
    }

    /**
     * @return Collection<int, Boisson>
     */
    public function getBoisson(): Collection
    {
        return $this->boisson;
    }

    public function addBoisson(Boisson $boisson): static
    {
        if (!$this->boisson->contains($boisson)) {
            $this->boisson->add($boisson);
        }

        return $this;
    }

    public function removeBoisson(Boisson $boisson): static
    {
        $this->boisson->removeElement($boisson);

        return $this;
    }

    /**
     * @return Collection<int, Extra>
     */
    public function getExtra(): Collection
    {
        return $this->extra;
    }

    public function addExtra(Extra $extra): static
    {
        if (!$this->extra->contains($extra)) {
            $this->extra->add($extra);
        }

        return $this;
    }

    public function removeExtra(Extra $extra): static
    {
        $this->extra->removeElement($extra);

        return $this;
    }

    /**
     * @return Collection<int, Dessert>
     */
    public function getDessert(): Collection
    {
        return $this->dessert;
    }

    public function addDessert(Dessert $dessert): static
    {
        if (!$this->dessert->contains($dessert)) {
            $this->dessert->add($dessert);
        }

        return $this;
    }

    public function removeDessert(Dessert $dessert): static
    {
        $this->dessert->removeElement($dessert);

        return $this;
    }
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPizzaQuantity(): ?int
    {
        return $this->pizzaQuantity;
    }

    public function setPizzaQuantity(?int $pizzaQuantity): static
    {
        $this->pizzaQuantity = $pizzaQuantity;

        return $this;
    }

    public function getBoissonQuantity(): ?int
    {
        return $this->boissonQuantity;
    }

    public function setBoissonQuantity(?int $boissonQuantity): static
    {
        $this->boissonQuantity = $boissonQuantity;

        return $this;
    }

    public function getDessertQuantity(): ?int
    {
        return $this->dessertQuantity;
    }

    public function setDessertQuantity(?int $dessertQuantity): static
    {
        $this->dessertQuantity = $dessertQuantity;

        return $this;
    }

    public function getExtraQuantity(): ?int
    {
        return $this->extraQuantity;
    }

    public function setExtraQuantity(?int $extraQuantity): static
    {
        $this->extraQuantity = $extraQuantity;

        return $this;
    }

    /**
     * @return Collection<int, Canette>
     */
    public function getCanette(): Collection
    {
        return $this->canette;
    }

    public function addCanette(Canette $canette): static
    {
        if (!$this->canette->contains($canette)) {
            $this->canette->add($canette);
        }

        return $this;
    }

    public function removeCanette(Canette $canette): static
    {
        $this->canette->removeElement($canette);

        return $this;
    }

    public function getCanetteQuantity(): ?int
    {
        return $this->canetteQuantity;
    }

    public function setCanetteQuantity(?int $canetteQuantity): static
    {
        $this->canetteQuantity = $canetteQuantity;

        return $this;
    }
    
}
