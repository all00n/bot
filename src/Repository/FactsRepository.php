<?php
// src/Repository/ProductRepository.php
namespace App\Repository;

class FactsRepository extends \Doctrine\ORM\EntityRepository
{    
    public function getFacts(){
        
        $em = $this->getEntityManager();
        
        $query = $em->createQuery('SELECT f.id, f.fact FROM App:Facts f order by f.id DESC');
       
        return $result = $query->getResult(); 
    }
}

