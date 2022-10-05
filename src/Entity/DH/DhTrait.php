<?php

namespace App\Entity\DH;

use App\Repository\DH\DhTraitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DhTraitRepository::class)]
#[ORM\Table(name: 'dh_trait')]
class DhTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avantage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $inconvenient = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

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

    public function getAvantage(): ?string
    {
        return $this->avantage;
    }

    public function setAvantage(?string $avantage): self
    {
        $this->avantage = $avantage;

        return $this;
    }

    public function getInconvenient(): ?string
    {
        return $this->inconvenient;
    }

    public function setInconvenient(?string $inconvenient): self
    {
        $this->inconvenient = $inconvenient;

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
}
