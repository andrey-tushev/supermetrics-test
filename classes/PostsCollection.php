<?php
/**
 * Collection of posts
 */
class PostsCollection {
    public $items = [];
    
    public function __construct(array $items = []) {
        $this->items = $items;
    }
    
    public function add(Post $post) {
        $this->items[] = $post;
    }
}