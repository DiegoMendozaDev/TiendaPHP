<?php
namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

 
 
#[ORM\Entity(repositoryClass: ProductoRepository::class)]
class Producto{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: 'integer')]
    private ?int $id_producto = null;

    #[ORM\ManyToOne(targetEntity: Categoria::class)]
    #[ORM\JoinColumn(name: 'id_categoria', referencedColumnName: "id_categoria")]
    private ?Categoria $categoria = null;

    #[ORM\Column(type: "string", length: 150)]
    private ?string $nombre = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(type:"decimal", precision: 10, scale:2)]
    private ?float $precio = null;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $marca = null;

    #[ORM\Column(type:"string", length:255)]
    private ?string $foto = null;

    #[ORM\Column(type: "integer")]
    private ?int $stock = null;


    public function getId(): int
    {
        return $this->id_producto;
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
    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }
    public function setCategoria(?Categoria $categoria): static
    {
        $this->categoria = $categoria;
        return $this;
    }
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;
        return $this;
    }
    public function getPrecio(): float
    {
        return $this->precio;
    }
    public function setPrecio(float $precio): static
    {
        $this->precio = $precio;
        return $this;
    }
    public function getMarca(): string
    {
        return $this->marca;
    }
    public function setMarca(string $marca): static
    {
        $this->marca = $marca;
        return $this;
    }
    public function getFoto(): string
    {
        return $this->foto;
    }
    public function setFoto(string $foto): static
    {
        $this->foto = $foto;
        return $this;
    }
    public function getStock(): int
    {
        return $this->stock;
    }
    public function setStock(int $stock): static
    {
        $this->stock = $stock;
        return $this;
    }

}