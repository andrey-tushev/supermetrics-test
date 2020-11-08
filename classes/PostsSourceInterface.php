<?php
interface PostsSourceInterface {
    public function getPosts(): PostsCollection;
}
