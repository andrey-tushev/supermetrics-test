<?php
/**
 * Test implementation of posts source
 */
class PostsSourceTest implements PostsSourceInterface {        
    public function getPosts(): PostsCollection {
        $collection = new PostsCollection();
        
        $post = new Post;
        $post->fromId = 10;
        $post->message = "Hello World";    
        $post->createdTime = new DateTime('2020-11-07 12:10:00');  
        $collection->add($post);
        
        $post = new Post;
        $post->fromId = 20;
        $post->fromId = "Hello Russia";    
        $post->createdTime = new DateTime('2020-11-07 13:25:00');   
        $collection->add($post);

        $post = new Post;
        $post->fromId = 10;
        $post->message = "Hello Finland";    
        $post->createdTime = new DateTime('2020-12-07 16:20:00');           
        $collection->add($post);
        
        $post = new Post;
        $post->fromId = 10;
        $post->message = "Hello USA";    
        $post->createdTime = new DateTime('2020-12-07 10:22:00');
        $collection->add($post);
        
        $post = new Post;
        $post->fromId = 10;
        $post->message = "Hello Netherlands";    
        $post->createdTime = new DateTime('2020-01-02 23:45:00');
        $collection->add($post);        
        
        return $collection;  
    }
}
