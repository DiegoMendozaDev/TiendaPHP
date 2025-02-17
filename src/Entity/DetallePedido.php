<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;


#[ORM\Entity(RepositoryClass: DetallePedido::class)]
class DetallePedido{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_detalle = null;
    #[ORM\Column(length : 255)]
    private ?int $cantidad = null;
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $precio_unitario = null;
    #[ORM\OneToOne(targetEntity: Pedidos::class)]
    #[ORM\JoinColumn(name: "id_pedido" ,referencedColumnName: "id_pedido")]
    private ?Pedidos $id_pedido = null;
    #[ORM\OneToOne(targetEntity: Productos::class)]
    #[ORM\JoinColumn(name: "id_producto" ,referencedColumnName: "id_producto")]
    private ?Productos $id_producto = null;

    public function __construct($cantidad, $precio_unitario)
    {
        $this->cantidad = $cantidad;
        $this->precio_unitario = $precio_unitario;
    }
    public function getId_Detalle(): ?int{
        return $this->id_detalle;
    }
    public function getCantidad(): ?int{
        return $this->cantidad;
    }
    public function getPrecio_Unitario(): ?string{
        return $this->precio_unitario;
    }
    public function getId_producto(): ?int{
        return $this->id_producto;
    }
    public function getId_pedido(): ?int{
        return $this->id_pedido;
    }
    public function setCantidad(int $cantidad) :static{
        $this->cantidad = $cantidad;
        return $this;
    }
    public function setPrecio_Unitario(string $precio_unitario): static{
        $this->precio_unitario = $precio_unitario;
        return $this;
    }
    public function setId_producto(Producto $id_producto): static{
        $this->id_producto = $id_producto;
        return $this;
    }
    public function setId_pedido(Pedidos $id_pedido):static{
        $this->id_pedido = $id_pedido;
        return $this;
    }
    


}
?>