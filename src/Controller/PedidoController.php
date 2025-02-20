<?php

namespace App\Controller;

use App\Entity\DetallePedido;
use App\Entity\Pedidos;
use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

#[Route('/api/pedido', name: '_pedido')]
class PedidoController extends AbstractController {
    #[Route('/ver', name: 'ver', methods:['GET'])]
    public function ver(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $pedidos = $entityManager->getRepository(Pedidos::class)->findAll();
        $data = [];
        foreach ($pedidos as $pedido) {
            $data[] = [
                'id' => $pedido->getId(),
                'title' => $pedido->getTitle(),
                'estado' => $pedido->getEstado(),
                'total' => $pedido->getTotal(),
                'cliente'=> $pedido->getCliente(),
                'detalle' => $pedido->getDetalle(),
            ];
        }
        return $this->json(['pedidos'=> $data], 200);
    }
    #[Route('/create', name: 'crear', methods:['POST'])]
    public function crear(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(),true);

        if(!isset($data['title'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['estado'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['total'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['id_usuario'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }
        $usuario = $entityManager->getRepository(Usuario::class)->find($data['id_usuario']);
        $pedido = new Pedidos($data['title'], $data['estado'],$data['total']);

        $pedido->setCliente($usuario);
        $entityManager->flush();
        return $this->json(['message'=> 'pedido creado correctamente'], 200);
    }
    #[Route('/eliminar/{id}',name: 'eliminar', methods:['DELETE'])]
    public function eliminar(EntityManagerInterface $entityManager,Request $request, int $id):JsonResponse
    {
        $pedido = $entityManager->getRepository(Pedidos::class)->find($id);
        $entityManager->remove($pedido);
        $entityManager->flush();
        return $this->json(['message'=>'Pedido eliminado correctamente'],200);
    }
    
    #[Route('/editar/{id}', name:'editar', methods:['PUT'])]
    public function editar(EntityManagerInterface $entityManager, Request $request, int $id):JsonResponse
    {
        $pedido = $entityManager->getRepository(Pedidos::class)->find($id);
        $data = json_decode($request->getContent(),true);
        if(isset($data['title'])){
            $pedido->setNombre($data['title']);
        }elseif(isset($data['estado'])){
            $pedido->setEmail($data['estado']);
        }elseif(isset($data['total'])){
            $pedido->setPassword($data['total']);
        }elseif(isset($data['id_detalle'])){
            $detalle = $entityManager->getRepository(DetallePedido::class)->find($data['id_detalle']);
            $pedido->addDetalle($detalle);
        }
        $entityManager->flush();
        return $this->json(["message" => "Usuario actualizado correctamente"],200);
    }
}
