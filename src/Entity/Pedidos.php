<?php

namespace App\Entity;

use App\Repository\PedidosRepository;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedidosRepository::class)]
class Pedidos
{
    #[ORM\id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_pedido = null;
    #[ORM\Column(length: 255)]
    private ?string $title = null;
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $fecha_pedido = null;
    #[ORM\Column(length: 50)]
    private ?string $estado = null;
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $total = null;
    #[ORM\OneToMany(targetEntity: DetallePedido::class, mappedBy: 'pedido')]
    private ?Collection $detalles = null;
    #[ORM\ManyToOne(inversedBy: 'pedidos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $usuario = null;

    public function __construct($title, $estado, $total)
    {
        $this->detalles = new ArrayCollection();
        $this->title = $title;
        $this->fecha_pedido = new DateTime('now', new DateTimeZone('Europe/Madrid'));
        $this->estado = $estado;
        $this->total = $total;
    }

    public function getId(): ?int
    {
        return $this->id_pedido;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function getFecha_Pedido(): ?\DateTimeInterface
    {
        return $this->fecha_pedido;
    }
    public function getEstado(): ?string
    {
        return $this->estado;
    }
    public function getTotal(): ?string
    {
        return $this->total;
    }
    public function getCliente(): ?Usuario
    {
        return $this->usuario;
    }
    public function getDetalle(): ?Collection
    {
        return $this->detalles;
    }
    public function addDetalle(DetallePedido $detalle): static
    {
        if(!$this->detalles->contains($detalle)){
            $this->detalles->add($detalle);
            $detalle->setPedido($this);
        }
        return $this;
    }
    public function removeDetalle(DetallePedido $detalle): static
    {
        if($this->detalles->removeElement($detalle)){
            if($detalle->getPedido() === $this){
                $detalle->setPedido(null);
            }
        }
        return $this;

    }
    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }
    public function setEstado(string $estado): static
    {
        $this->estado = $estado;
        return $this;
    }
    public function setTotal(string $total): static
    {
        $this->total = $total;
        return $this;
    }
    public function setFecha_Pedido(\DateTimeInterface $fecha_pedido): static
    {
        $this->fecha_pedido = $fecha_pedido;
        return $this;
    }
    public function setCliente(Usuario $usuario): static
    {
        $this->usuario = $usuario;
        return $this;
    }
}
