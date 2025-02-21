<?php
use Entities\Libro;

class Libros_Model
{
    protected $entityManager;
    public function __construct()
    {
        $this->entityManager = DoctrineManager::getEntityManager();
    }
    public function getLibros()
    {
        return $this->entityManager->getRepository(Libro::class)->findAll();
    }
    public function getLibro($id)
    {
        return $this->entityManager->find(Libro::class, $id);
    }
    public function eliminarLibro($id){
        $libro = $this->entityManager->find(Libro::class, $id);
        $this->entityManager->remove($libro);
        flush();
    }
    public function editarLibro($id,$titulo,$precio,$id_autor){
        $libro = $this->entityManager->find(Libro::class, $id);
        $libro->setTitulo($titulo);
        $libro->setPrecio($precio);
        $libro->setIdAutor($id_autor);
        flush();
    }
}
