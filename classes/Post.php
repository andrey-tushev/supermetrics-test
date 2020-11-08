<?php
/**
 * Post model
 */
class Post {
    public $id;
    public $fromName;
    public $fromId;
    public $message;
    public $type;
    public $createdTime;   
    
    public function monthNum(): int {
        return (int)$this->createdTime->format('n');
    }

    public function weekNum(): int {
        return (int)$this->createdTime->format('W');
    }
}