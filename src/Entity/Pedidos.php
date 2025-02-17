<?php
namespace App\Entity;

use App\Repository\PedidosRepository;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
use Doctrine\DBAL\Types\DecimalType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: PedidosRepository::class)]
class Pedidos{
    #[ORM\id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_pedido = null;
    #[ORM\Column(length : 255)]
    private ?string $title = null;
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $fecha_pedido = null;
    #[ORM\Column(length:50)]
    private ?string $estado = null;
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $total = null;
    #[ORM\OneToOne(mappedBy:'pedidos', targetEntity: DetallePedido::class)]
    private ?DetallePedido $detalle = null;
    #[ORM\ManyToOne(inversedBy: 'pedidos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cliente $cliente = null;
    

    
    public function __construct($title, $estado, $total)
    {
        $this->title = $title;
        $this->fecha_pedido = new DateTime('now', new DateTimeZone('Europe/Madrid'));
        $this->estado = $estado;
        $this->total = $total;
    }
    
    public function getId(): ?int{
        return $this->id_pedido;
    }
    public function getTitle(): ?string{
        return $this->title;
    }
    public function getFecha_Pedido(): ?\DateTimeInterface{
        return $this->fecha_pedido;
    }
    public function getEstado(): ?string{
        return $this->estado;
    }
    public function getTotal(): ?string{
        return $this->total;
    }
    public function getCliente(): ?Cliente{
        return $this->cliente;
    }
    public function getDetalle(): ?DetallePedido{
        return $this->detalle;
    }
    public function setDetalle(DetallePedido $detalle): static{
        $this->detalle = $detalle;
        return $this;
    }
    public function setTitle(string $title): static{
        $this->title = $title;
        return $this;
    }
    public function setEstado(string $estado): static{
        $this->estado = $estado;
        return $this;
    }
    public function setTotal(string $total): static{
        $this->total = $total;
        return $this;
    }
    public function setFecha_Pedido(\DateTimeInterface $fecha_pedido): static{
        $this->fecha_pedido = $fecha_pedido;
        return $this;
    }
    public function setCliente(Cliente $cliente): static{
        $this->cliente = $cliente;
        return $this;
    }
    

}
?>