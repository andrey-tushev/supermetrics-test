<?php
class Api {     
    public function getToken(string $clientId, string $email, string $name): string {
        $call = new Network('POST', '/assignment/register', [
            'client_id' => $clientId,
            'email'     => $email,
            'name'      => $name    
        ]);
        $result = $call->fetch();        
        if(!isset($result->data->sl_token)) {
            throw new ApiException('No token in API responce');
        }
        
        return $result->data->sl_token;        
    }
    
    public function getPosts(string $token): PostsCollection {
        $collection = new PostsCollection;

        for($p=1; $p<=Config::$pagesQty; $p++) {
            $records = $this->getPostsPage($token, $p);
            foreach($records as $record) {
                $collection->add(self::recordToPost($record));
            }            
        }
                
        return $collection;
    }
    
    private static function recordToPost(object $record): Post {
        $post = new Post;
        $post->id          = $record->id;
        $post->fromName    = $record->from_name;
        $post->fromId      = $record->from_id;
        $post->message     = $record->message;
        $post->type        = $record->type;
        $post->createdTime = new DateTime($record->created_time);
        return $post;        
    }
    
    private function getPostsPage(string $token, int $page=1): array {
        $call = new Network('GET', '/assignment/posts', [
            'sl_token' => $token,
            'page' => 1
        ]);   
        $responce = $call->fetch();
        if(!isset($responce->data->posts) || !is_array($responce->data->posts)) {
            throw new ApiException('No posts list in API responce');
        }        
        return $responce->data->posts;        
    }
}