<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/usuario', name:'api_usuarios')]
class UsuarioController extends AbstractController{

    #[Route('/create', name:'create', methods:['Post'])]
    public function create(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(),true);
        if(!isset($data['nombre'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['email'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['contrasena'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['direccion'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }elseif(!isset($data['codigo_postal'])){
            return $this->json(['Error'=>'Fatal Error'],400);
        }
        $usuario = new Usuario;

        $usuario->setNombre($data['nombre']);
        $usuario->setEmail($data['email']);
        $usuario->setPassword($data['contrasena']);
        $usuario->setDireccion($data['direccion']);
        $usuario->setPostal($data['codigo_postal']);

        $entityManager->persist($usuario);
        $entityManager->flush();
        return $this->json(["message" => "Usuario creado correctamente"],200);
    }
    #[Route('/ver', name:"ver", methods: ['GET'])]
    public function verTodos(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $usuarios = $entityManager->getRepository(Usuario::class)->findAll();
        $data = [];
        foreach ($usuarios as $usuario) {
            $data[] = [
                'id'=> $usuario->getId(),
                'email' => $usuario->getEmail(),
                'roles' => $usuario->getRoles(),
                'contrasena' => $usuario->getPassword(),
                'fecha_registro' => $usuario->getFecha(),
                'direccion' => $usuario->getDireccion(),
                'codigo_postal'=> $usuario->getPostal()
            ];
        }
        return $this->json($data,200);
    }
    #[Route('/eliminar/{id}', name:"delete", methods:['DELETE'])]
    public function eleminar(EntityManagerInterface $entityManager, Request $request, int $id) :JsonResponse
    {
        $usuario = $entityManager->getRepository(Usuario::class)->find($id);
        $entityManager->remove($usuario);
        $entityManager->flush();
        return $this->json(["message" => "usuario eleminador correctamente"],200);
    }
    #[Route('/editar/{id}', name:"editar", methods:["PUT"])]
    public function editar(EntityManagerInterface $entityManager, Request $request, int $id):JsonResponse
    {
        $usuario = $entityManager->getRepository(Usuario::class)->find($id);

        $data = json_decode($request->getContent(),true);
        if(isset($data['nombre'])){
            $usuario->setNombre($data['nombre']);
        }elseif(isset($data['email'])){
            $usuario->setEmail($data['email']);
        }elseif(isset($data['contrasena'])){
            $usuario->setPassword($data['contrasena']);
        }elseif(isset($data['direccion'])){
            $usuario->setDireccion($data['direccion']);
        }elseif(isset($data['codigo_postal'])){
            $usuario->setPostal($data['codigo_postal']);
        }
        $entityManager->flush();
        return $this->json(["message" => "Usuario actualizado correctamente"],200);
    }
}