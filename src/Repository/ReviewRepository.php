<?php

namespace App\Repository;

class ReviewRepository extends \Doctrine\ORM\EntityRepository
{    
    public function getReview(){
        
        $em = $this->getEntityManager();
        
        $query = $em->createQuery('SELECT r FROM App:Review r ORDER BY r.id DESC');
       
        return $result = $query->getResult(); 
    }
}

