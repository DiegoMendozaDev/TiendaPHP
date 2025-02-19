<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/usuario', name:'api_')]
class UsuarioController extends AbstractController{

    #[Route('/create', name:'usuario_create', methods:['Post'])]
    public function create(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(),true);
        if(!isset($dato['nombre'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($dato['email'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($dato['contrasena'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($dato['direccion'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($dato['codigo_postal'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }
        $usuario = new Usuario;

        $usuario->setNombre($dato['nombre']);
        $usuario->setEmail($dato['email']);
        $usuario->setPassword($dato['contrasena']);
        $usuario->setDireccion($dato['direccion']);
        $usuario->setPostal($dato['codigo_postal']);

        $entityManager->persist($usuario);
        $entityManager->flush();
    }
}