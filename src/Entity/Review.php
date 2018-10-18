<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 * @ORM\Table(name="review")
 */
class Review {
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
     * @ORM\Column(type="text")
     */
    private $review;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $status;
    
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    
    function getId() {
        return $this->id;
    }

    function getChat_id() {
        return $this->chat_id;
    }

    function getReview() {
        return $this->review;
    }

    function getStatus() {
        return $this->status;
    }

    function getDate() {
        return $this->date;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setChat_id($chat_id) {
        $this->chat_id = $chat_id;
    }

    function setReview($review) {
        $this->review = $review;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setDate($date) {
        $this->date = $date;
    }
}
