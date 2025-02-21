<?php
use Entities\Autores;
class Autores_model{
    protected $entityManager;
    public function __construct()
    {
       $this->entityManager = DoctrineManager::getEntityManager();
    }
    public function getAutores(){
        return $this->entityManager->getRepository(Autores::class)->findAll();
    }
}
?>