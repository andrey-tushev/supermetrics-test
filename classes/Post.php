<?php
class Post {
    public $id;
    public $fromName;
    public $fromId;
    public $message;
    public $type;
    public $createdTime;   
    
    public function monthNum() {
        return (int)$this->createdTime->format('n');
    }

    public function weekNum() {
        return (int)$this->createdTime->format('W');
    }
}