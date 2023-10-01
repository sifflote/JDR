<?php

namespace App\Entity\Banque;

use App\Repository\Banque\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
#[ORM\Table(name: 'b_categorie')]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $debitCredit = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Intitule::class)]
    private Collection $intitules;

    public function __construct()
    {
        $this->intitules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isDebitCredit(): ?bool
    {
        return $this->debitCredit;
    }

    public function setDebitCredit(bool $debitCredit): static
    {
        $this->debitCredit = $debitCredit;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Intitule>
     */
    public function getIntitules(): Collection
    {
        return $this->intitules;
    }

    public function addIntitule(Intitule $intitule): static
    {
        if (!$this->intitules->contains($intitule)) {
            $this->intitules->add($intitule);
            $intitule->setCategorie($this);
        }

        return $this;
    }

    public function removeIntitule(Intitule $intitule): static
    {
        if ($this->intitules->removeElement($intitule)) {
            // set the owning side to null (unless already changed)
            if ($intitule->getCategorie() === $this) {
                $intitule->setCategorie(null);
            }
        }

        return $this;
    }
}
