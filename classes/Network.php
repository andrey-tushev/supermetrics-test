<?php
/**
 * Universal HTTP network client
 */
class Network {
    const POST = 'POST';
    const GET = 'GET';
    
    public $protocol = 'https';
    public $host = 'api.supermetrics.com';    
    public $path = '/';    
    public $method = self::POST;
    public $params = [];
    
    public function __construct(string $method, string $path, array $params) {
        $this->method = $method;
        $this->path = $path;
        $this->params = $params;
    }
    
    public function fetch(): object {        
        if($this->method == self::GET) {
           return $this->get();
        }
        else {
           return $this->post();      
        }        
    }
    
    private function post(): object {
        $context = stream_context_create([
            'http' => [
                'method' => $this->method,
                'header' => 'Content-type: application/x-www-form-urlencoded',                                
                'content' => http_build_query($this->params),
                'ignore_errors' => false
            ]            
        ]);          
        $json = @file_get_contents($this->protocol.'://'.$this->host.$this->path, false, $context);       
        if($json === false) {
            throw new NetworkException("{$this->method} {$this->path}");
        }        
        $data = json_decode($json);
        return $data;          
    }
    
    private function get(): object {
        $context = stream_context_create([
            'http' => [
                'method' => $this->method,                
                'ignore_errors' => false
            ]            
        ]);          
        $json = @file_get_contents($this->protocol.'://'.$this->host.$this->path.'?'.http_build_query($this->params), false, $context); 
        if($json === false) {
            throw new NetworkException("Network error: {$this->method} {$this->path}");
        }        
        $data = json_decode($json);
        return $data;        
    }
}
