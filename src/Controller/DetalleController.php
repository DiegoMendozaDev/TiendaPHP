<?php

namespace App\Controller;

use App\Entity\DetallePedido;
use App\Entity\Pedidos;
use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

#[Route('/api/detalle', name: '_api')]
class DetalleController extends AbstractController {
    #[Route('/ver', name:'_ver', methods : 'get')]
    public function index(EntityManagerInterface $entityManager) : JsonResponse{
        $detalles = $entityManager->getRepository(DetallePedido::class)->findAll();
        $data = [];
        foreach($detalles as $detalle){
            $data[] = [
                'id_pedido' => $detalle->getId_pedido(),
                'id_producto' => $detalle->getId_producto(),
                'cantidad' => $detalle->getCantidad(),
                'precio_unitario' => $detalle->getPrecio_Unitario()
            ];
        }
        return $this->json($data,200);
    }
    #[Route('/create', name:'_create', methods:['post'])]
    public function create(EntityManagerInterface $entityManager, Request $request): JsonResponse{
        $data = json_decode($request->getContent(), true);
        if(!isset($data['id_producto']) || !isset($data['id_pedido'])){
            return $this->json(["message" => "Error: Invalid data"]);
        }
        $detalle = new DetallePedido();
        $pedido = $entityManager->getRepository(Pedidos::class)->find($data['id_pedido']);
        $producto = $entityManager->getRepository(Producto::class)->find($data['id_producto']);
        $detalle->setId_pedido($pedido);
        $detalle->setId_producto($producto);
        $detalle->setCantidad($data['cantidad']);
        $detalle->setPrecio_Unitario($data['precio_unitario']);
        $entityManager->persist($detalle);
        $entityManager->flush();
        $data = [
            'id' => $detalle->getId_Detalle(),
            'id_pedido' => $detalle->getId_pedido(),
            'id_producto' => $detalle->getId_producto(),
            'cantidad' => $detalle->getCantidad(),
            'precio_unitario' => $detalle->getPrecio_Unitario()
        ];
        return $this->json($data, 201);
    }
    #[Route('/update', name:'_update', methods: ['put, patch'])]
    public function update(EntityManagerInterface $entityManager, Request $request, int $id): JsonResponse{
        $detalle = json_decode($request->getContent(), true);
        if(!$detalle){
            return $this->json(["detalle" => "Error: no existe detalle"]);
        }
        
    }
}
