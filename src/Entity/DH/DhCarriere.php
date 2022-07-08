<?php

namespace App\Entity\DH;

use App\Repository\DH\DhCarriereRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DhCarriereRepository::class)]
class DhCarriere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 8)]
    private $argentOnCreate;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArgentOnCreate(): ?string
    {
        return $this->argentOnCreate;
    }

    public function setArgentOnCreate(string $argentOnCreate): self
    {
        $this->argentOnCreate = $argentOnCreate;

        return $this;
    }
}
