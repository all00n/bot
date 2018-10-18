<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="keyboard")
 */
class Keyboard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(name="`key`",type="string")
     */
    private $key;    

    // add your own fields
    
    function getId() {
        return $this->id;
    }

    function getKey() {
        return $this->key;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setKey($key) {
        $this->key = $key;
    }
}
