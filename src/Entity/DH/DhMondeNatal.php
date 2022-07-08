<?php

namespace App\Entity\DH;

use App\Repository\DH\DhMondeNatalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DhMondeNatalRepository::class)]
#[ORM\Table(name: 'dh_monde_natal')]
class DhMondeNatal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name;

    #[ORM\Column(type: 'integer')]
    private ?int $min;

    #[ORM\Column(type: 'integer')]
    private ?int $max;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

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

    #[ORM\Column(type: 'string', length: 5)]
    private $ptsBlessure;

    #[ORM\Column(type: 'string', length: 50)]
    private $ptsDestin;

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

    public function getMin(): ?int
    {
        return $this->min;
    }

    public function setMin(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(int $max): self
    {
        $this->max = $max;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getIntel(): ?string
    {
        return $this->Intel;
    }

    public function setIntel(string $Intel): self
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

    public function getPtsBlessure(): ?string
    {
        return $this->ptsBlessure;
    }

    public function setPtsBlessure(string $ptsBlessure): self
    {
        $this->ptsBlessure = $ptsBlessure;

        return $this;
    }

    public function getPtsDestin(): ?string
    {
        return $this->ptsDestin;
    }

    public function setPtsDestin(string $ptsDestin): self
    {
        $this->ptsDestin = $ptsDestin;

        return $this;
    }
}
