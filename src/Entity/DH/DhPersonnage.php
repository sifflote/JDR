<?php

namespace App\Entity\DH;

use App\Entity\Users;
use App\Repository\DH\DhPersonnageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DhPersonnageRepository::class)]
#[ORM\Table(name: 'dh_personnage')]
class DhPersonnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'dhPersonnages')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'integer')]
    private $CC;

    #[ORM\Column(type: 'integer')]
    private $CT;

    #[ORM\Column(type: 'integer')]
    private $F;

    #[ORM\Column(type: 'integer')]
    private $E;

    #[ORM\Column(type: 'integer')]
    private $Ag;

    #[ORM\Column(type: 'integer')]
    private $Intel;

    #[ORM\Column(type: 'integer')]
    private $Per;

    #[ORM\Column(type: 'integer')]
    private $FM;

    #[ORM\Column(type: 'integer')]
    private $Soc;

    #[ORM\ManyToOne(targetEntity: DhMondeNatal::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $MondeNatal;

    #[ORM\Column(type: 'string', length: 1)]
    private $sexe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCC(): ?int
    {
        return $this->CC;
    }

    public function setCC(int $CC): self
    {
        $this->CC = $CC;

        return $this;
    }

    public function getCT(): ?int
    {
        return $this->CT;
    }

    public function setCT(int $CT): self
    {
        $this->CT = $CT;

        return $this;
    }

    public function getF(): ?int
    {
        return $this->F;
    }

    public function setF(int $F): self
    {
        $this->F = $F;

        return $this;
    }

    public function getE(): ?int
    {
        return $this->E;
    }

    public function setE(int $E): self
    {
        $this->E = $E;

        return $this;
    }

    public function getAg(): ?int
    {
        return $this->Ag;
    }

    public function setAg(int $Ag): self
    {
        $this->Ag = $Ag;

        return $this;
    }

    public function getIntel(): ?int
    {
        return $this->Intel;
    }

    public function setIntel(int $Intel): self
    {
        $this->Intel = $Intel;

        return $this;
    }

    public function getPer(): ?int
    {
        return $this->Per;
    }

    public function setPer(int $Per): self
    {
        $this->Per = $Per;

        return $this;
    }

    public function getFM(): ?int
    {
        return $this->FM;
    }

    public function setFM(int $FM): self
    {
        $this->FM = $FM;

        return $this;
    }

    public function getSoc(): ?int
    {
        return $this->Soc;
    }

    public function setSoc(int $Soc): self
    {
        $this->Soc = $Soc;

        return $this;
    }

    public function getMondeNatal(): ?DhMondeNatal
    {
        return $this->MondeNatal;
    }

    public function setMondeNatal(?DhMondeNatal $MondeNatal): self
    {
        $this->MondeNatal = $MondeNatal;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
}
