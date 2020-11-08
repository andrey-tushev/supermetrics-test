<?php
/**
 * Interface for any posts sources
 */
interface PostsSourceInterface {
    public function getPosts(): PostsCollection;
}
