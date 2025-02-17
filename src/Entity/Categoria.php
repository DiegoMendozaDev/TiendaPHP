<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: CategoriaRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_NOMBRE_CATEGORIA', fields:['nombre'])]
#[UniqueEntity(fields:['nombre'], message: "Ya hay una categoría con ese nombre")]
class Categoria{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    private ?int $id_categoria=null;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $descripcion = null;

    public function getId(): int
    {
        return $this->id_categoria;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;
        return $this;
    }
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
    public function setDescripcion(string $descripcion) : static
    {
        $this->descripcion = $descripcion;
        return $this;
    }
}