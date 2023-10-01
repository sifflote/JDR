<?php

namespace App\Entity\Banque;

use App\Repository\Banque\OperationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationRepository::class)]
#[ORM\Table(name: 'b_operation')]
class Operation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'operations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Compte $compte = null;

    #[ORM\ManyToOne(inversedBy: 'operations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Intitule $intitule = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $montant = null;

    #[ORM\Column]
    private ?bool $is_virement = null;

    #[ORM\ManyToOne]
    private ?Compte $virementCompte = null;

    #[ORM\Column]
    private ?bool $is_repeat = null;

    #[ORM\Column(nullable: true)]
    private ?\DateInterval $repeatCycle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): static
    {
        $this->compte = $compte;

        return $this;
    }

    public function getIntitule(): ?Intitule
    {
        return $this->intitule;
    }

    public function setIntitule(?Intitule $intitule): static
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function isIsVirement(): ?bool
    {
        return $this->is_virement;
    }

    public function setIsVirement(bool $is_virement): static
    {
        $this->is_virement = $is_virement;

        return $this;
    }

    public function getVirementCompte(): ?Compte
    {
        return $this->virementCompte;
    }

    public function setVirementCompte(?Compte $virementCompte): static
    {
        $this->virementCompte = $virementCompte;

        return $this;
    }

    public function isIsRepeat(): ?bool
    {
        return $this->is_repeat;
    }

    public function setIsRepeat(bool $is_repeat): static
    {
        $this->is_repeat = $is_repeat;

        return $this;
    }

    public function getRepeatCycle(): ?\DateInterval
    {
        return $this->repeatCycle;
    }

    public function setRepeatCycle(?\DateInterval $repeatCycle): static
    {
        $this->repeatCycle = $repeatCycle;

        return $this;
    }
}
