<?php

namespace App\Entity;

use App\Entity\DH\DhPersonnage;
use App\Repository\UsersRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\EntityListeners(['App\EntityListener\UsersListener'])]
#[UniqueEntity(fields: ['email'], message: 'Cet e-mail est déjà utilisé.')]
#[ORM\Table(name: 'users')]
class Users implements UserInterface // Pas d'erreur ici
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Assert\Email()]
    #[Assert\Length(min: 2, max: 180)]
    private ?string $email;

    #[ORM\Column(type: 'json')]
    #[Assert\NotNull()]
    private array $roles = [];

    private ?string $plainpassword = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $password = null;

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $username;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $google_id;

    #[ORM\Column(type: 'boolean')]
    private $is_verified = false;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $resetToken;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Assert\NotNull()]
    private DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Assert\NotNull()]
    private \DateTimeImmutable $updatedAt;

    #[ORM\Column(type: 'boolean')]
    private $googleUse = 0;

    #[ORM\Column(type: 'boolean')]
    private $mdpUse = 0;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: DhPersonnage::class, orphanRemoval: true)]
    private $dhPersonnages;



    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->dhPersonnages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getGoogleId(): ?string
    {
        return $this->google_id;
    }

    public function setGoogleID(string $google_id): self
    {
        $this->google_id = $google_id;

        return $this;
    }

    public function getIsVerified(): ?bool
    {
        return $this->is_verified;
    }

    public function setIsVerified(bool $is_verified): self
    {
        $this->is_verified = $is_verified;
        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }


    public function setResetToken($resetToken): self
    {
        $this->resetToken = $resetToken;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getPlainpassword(): ?string
    {
        return $this->plainpassword;
    }

    /**
     * Set the value of plainPassword
     *
     * @return  self
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }


    public function getGoogleUse(): ?bool
    {
        return $this->googleUse;
    }

    public function setGoogleUse(?bool $googleUse): self
    {
        $this->googleUse = $googleUse;

        return $this;
    }

    public function getMdpUse(): ?bool
    {
        return $this->mdpUse;
    }

    public function setMdpUse(bool $mdpUse): self
    {
        $this->mdpUse = $mdpUse;

        return $this;
    }

    /**
     * @return Collection<int, DhPersonnage>
     */
    public function getDhPersonnages(): Collection
    {
        return $this->dhPersonnages;
    }

    public function addDhPersonnage(DhPersonnage $dhPersonnage): self
    {
        if (!$this->dhPersonnages->contains($dhPersonnage)) {
            $this->dhPersonnages[] = $dhPersonnage;
            $dhPersonnage->setUser($this);
        }

        return $this;
    }

    public function removeDhPersonnage(DhPersonnage $dhPersonnage): self
    {
        if ($this->dhPersonnages->removeElement($dhPersonnage)) {
            // set the owning side to null (unless already changed)
            if ($dhPersonnage->getUser() === $this) {
                $dhPersonnage->setUser(null);
            }
        }

        return $this;
    }

}
