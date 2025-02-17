<?php

namespace App\Controller;

use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name:'api_')]
class ProductoControlle extends AbstractController{
    #[Route('/productos', name:'_productos', methods: ['get'])]
    public function index(EntityManagerInterface $entityManager): JsonResponse{
        $productos = $entityManager->getRepository(Producto::class)
        ->findAll();
        $data = [];
        foreach ($productos as $producto){
            $data[] = ['id' => $producto->getId(),
                        'name' => $producto->getNombre(),
                        'descripcion' => $producto->getDescripcion(),
                        'precio' => $producto->getPrecio(),
                        'marca' => $producto->getMarca(),
                        'detalle' => $producto->getDetalle(),
                        'foto' => $producto->getFoto(),
                        'stock' => $producto->getStock()
        ];
        }
        return $this->json($data, 200);
    }
    #[Route('/create', name: '_create', methods: ['post'])]
    public function create(EntityManagerInterface $entityManager, Request $request): JsonResponse{
        $data = json_decode($request->getContent(), true);
        if(!isset($data['nombre']) ||!isset($data['descripcion'])){
            return $this->json(['error' => 'invalid data'], 400);
        }
        $producto = new Producto();
        $producto->setNombre($data['nombre']);
        $producto->setDescripcion($data['descripcion']);
        $producto->setPrecio($data['precio']);
        $producto->setMarca($data['marca']);
        $producto->setFoto($data['foto']);
        $producto->setStock($data['stock']);
        $entityManager->persist($producto);
        $entityManager->flush();
        $data = [
            'id' => $producto->getId(),
            'nombre' => $producto->getNombre(),
            'descripcion' => $producto->getDescripcion(),
            'precio' => $producto->getPrecio(),
            'marca' => $producto->getMarca(),
            'foto' => $producto->getFoto(),
            'stock' => $producto->getStock(),
        ];
        return $this->json($data, 200);
    }
}
