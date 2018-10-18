<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ReserveRepository")
 * @ORM\Table(name="reserve")
 */
class Reserve {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $chat_id;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $status;
    
    /**
     * @ORM\Column(type="string")
     */
    private $date;
    
    /**
     * @ORM\Column(type="string")
     */
    private $count;
    
    /**
     * @ORM\Column(type="string")
     */
    private $time;
    
    /**
     * @ORM\Column(type="string")
     */
    private $phone;
    
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    
    /**
     * @ORM\Column(type="text")
     */
    private $comment;
   
    /**
     * @ORM\Column(type="datetime")
     */
    private $create_time;
    
    

    // add your own fields
    
    function getId() {
        return $this->id;
    }

    function getChat_id() {
        return $this->chat_id;
    }

    function getStatus() {
        return $this->status;
    }

    function getDate() {
        return $this->date;
    }

    function getCount() {
        return $this->count;
    }

    function getTime() {
        return $this->time;
    }

    function getPhone() {
        return $this->phone;
    }

    function getName() {
        return $this->name;
    }
    
    function getComment() {
        return $this->comment;
    }

    function getCreate_time() {
        return $this->create_time;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setChat_id($chat_id) {
        $this->chat_id = $chat_id;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setCount($count) {
        $this->count = $count;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setName($name) {
        $this->name = $name;
    }
    
    function setComment($comment) {
        $this->comment = $comment;
    }

    function setCreate_time($create_time) {
        $this->create_time = $create_time;
    }
}
