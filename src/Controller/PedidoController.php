<?php

namespace App\Controller;

use App\Entity\Pedidos;
use Doctrine\ORM\EntityManager;
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
    #[Route('/crear', name: 'crear', methods:['POST'])]
    public function crear(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(),true);

        if(!isset($data['title'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['estado'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['total'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['id_detalle'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['id_usuario'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }

        $pedido = new Pedidos($data['title'], $data['estado'],$data['total']);
    }
}
