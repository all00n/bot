<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\FactsRepository")
 * @ORM\Table(name="facts_about_beer")
 */
class Facts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $fact;
    
    

    // add your own fields
    
    function getId() {
        return $this->id;
    }

    function getFact() {
        return $this->fact;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFact($fact) {
        $this->fact = $fact;
    }

}
