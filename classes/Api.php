<?php
class Api {    
    public function getToken() {
        $call = new Network('POST', '/assignment/register', [
            'client_id' => Config::$clinetId,
            'email'     => Config::$email,
            'name'      => Config::$name    
        ]);
        $result = $call->fetch();        
        return $result->data->sl_token;        
    }
    
    public function getPosts(string $token) {
        $recs = [];
        for($p=1; $p<=10; $p++) {
            $recs = array_merge($recs, $this->getPostsPage($token, $p));
        }
        
        $mapper = function($rec) {
            $post = new Post;
            $post->id          = $rec->id;
            $post->fromName    = $rec->from_name;
            $post->fromId      = $rec->from_id;
            $post->message     = $rec->message;
            $post->type        = $rec->type;
            $post->createdTime = new DateTime($rec->created_time);
            return $post;
        };
        $posts = array_map($mapper, $recs);
        
        return $posts;
    }
    
    private function getPostsPage(string $token, int $page) {
        $call = new Network('GET', '/assignment/posts', [
            'sl_token' => $token,
            'page' => 1
        ]);   
        return $call->fetch()->data->posts;        
    }
}