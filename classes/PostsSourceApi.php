<?php
class PostsSourceApi implements PostsSourceInterface {        
    public function getPosts(): PostsCollection {
        $api = new Api;
        
        $token = $api->getToken(
            Config::$clinetId,
            Config::$email,
            Config::$name                 
        );
        
        return $api->getPosts($token);        
    }
}
