<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="all_chat_id")
 */
class ChatId
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $chat_id;
    
    function getChat_id() {
        return $this->chat_id;
    }

    function setChat_id($chat_id) {
        $this->chat_id = $chat_id;
    }
}
