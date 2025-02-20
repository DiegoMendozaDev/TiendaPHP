<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;


#[ORM\Entity(RepositoryClass: DetallePedido::class)]
class DetallePedido
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_detalle = null;
    #[ORM\Column(length: 255)]
    private ?int $cantidad = null;
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $precio_unitario = null;
    #[ORM\ManyToOne(targetEntity: Pedidos::class, inversedBy:"pedido")]
    #[ORM\JoinColumn(name: "id_pedido", referencedColumnName: "id_pedido")]
    private ?Pedidos $pedido = null;
    #[ORM\OneToOne(targetEntity: Producto::class)]
    #[ORM\JoinColumn(name: "id_producto", referencedColumnName: "id_producto")]
    private ?Producto $id_producto = null;

   
    public function getId_Detalle(): ?int
    {
        return $this->id_detalle;
    }
    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }
    public function getPrecio_Unitario(): ?string
    {
        return $this->precio_unitario;
    }
    public function getId_producto(): ?int
    {
        return $this->id_producto;
    }
    public function getPedido(): ?Pedidos
    {
        return $this->pedido;
    }
    public function setCantidad(int $cantidad): static
    {
        $this->cantidad = $cantidad;
        return $this;
    }
    public function setPrecio_Unitario(string $precio_unitario): static
    {
        $this->precio_unitario = $precio_unitario;
        return $this;
    }
    public function setId_producto(Producto $id_producto): static
    {
        $this->id_producto = $id_producto;
        return $this;
    }
    public function setPedido(Pedidos $pedido): static
    {
        $this->pedido = $pedido;
        return $this;
    }
}
