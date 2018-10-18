<?php
// src/Repository/ProductRepository.php
namespace App\Repository;

class ReserveRepository extends \Doctrine\ORM\EntityRepository
{    
    public function getReserve(){
        
        $em = $this->getEntityManager();
        
        $query = $em->createQuery('SELECT r FROM App:Reserve r WHERE r.status = 0 ORDER BY r.id DESC');
       
        return $result = $query->getResult(); 
    }
    
    public function getAnnulmentReserve(){
        
        $em = $this->getEntityManager();
        
        $query = $em->createQuery('SELECT r FROM App:Reserve r WHERE r.status = 1 ORDER BY r.id DESC');
       
        return $result = $query->getResult(); 
    }
}

