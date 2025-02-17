<?php

namespace App\Entity;

use App\Repository\UsuariosRespository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORm\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsuariosRespository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Usuario implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_usuario = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(lenght: 150)]
    private ?string $email = null;

    #[ORM\Column()]
    private array $roles = [];

    #[ORM\column]
    private ?string $contrasena = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha_registro = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Entity(length: 20)]
    private ?string $codigo_postal = null;

    public function getId(): ?int
    {
        return $this->id_usuario;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(String $email): static
    {
        $this->email = $email;
        return $this;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function setNombre(string $nombre):static
    {
        $this->nombre = $nombre;
        return $this;
    }
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    
    public function setRoles(Array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->contrasena;
    }
    public function setPassword(string $contrasena): static
    {
        $this->contrasena = $contrasena;
        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha_registro;
    }
    public function setFecha(\DateTimeImmutable $fechaRegistro): static
    {
        $this->fecha_registro = $fechaRegistro;
        return $this;
    }
    public function getDireccion(): string
    {
        return $this->direccion;
    }
    public function setDireccion(string $direccion): static
    {
        $this->direccion = $direccion;
        return $this;
    }
    public function getPostal(): string
    {
        return $this->codigo_postal;
    } 
    public function setPostal(string $postal):static
    {
        $this->codigo_postal = $postal;
        return $this;
    }
    public function eraseCredentials(): void
    {
        
    }

}