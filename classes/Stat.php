<?php
class Stat {
    private $posts;
    
    public function __construct(array $posts) {
        $this->posts = $posts;
    }
    
    /** 
     * Average character length of posts per month 
     */
    public function getAvgPerMonth() {
        $months = [];        
        foreach($this->posts as $post) {
            $months[$post->monthNum()][] = mb_strlen($post->message);
        }        
        
        $avgs = array_map(function($m){
            return array_sum($m) / count($m);
        }, $months);
        
        return $avgs;
    }    
    
    /** 
     * Longest post by character length per month 
     */
    public function getLongestPerMonth() {
        $months = [];        
        foreach($this->posts as $post) {
            $months[$post->monthNum()][] = mb_strlen($post->message);
        }        
        
        $maxes = array_map(function($m){
            return max($m);
        }, $months);      
        
        return $maxes;        
    }
    
    /** 
     * Total posts split by week number 
     */
    public function getPostsByWeeks() {
        $stat = [];        
        foreach($this->posts as $post) {            
            $stat[] = $post->weekNum();
        }                
        return array_count_values($stat);
    }      
    
    /**
     * [Average!] number of posts per user per month 
     * Why average!? Just a number. 
     */
    public function getAvgPerUserPerMonth() {
        $stat = [];        
        foreach($this->posts as $post) {
            if(isset($stat[ $post->fromId ][ $post->monthNum() ])) {
                $stat[ $post->fromId ][ $post->monthNum() ] ++;
            }
            else {
                $stat[ $post->fromId ][ $post->monthNum() ] = 1;
            }
        }
        return $stat;
    }  
    
    /**
     * All possible statistics     
     */
    public function getAll() {
        return [    
            'avg_per_user_per_month' => $this->getAvgPerUserPerMonth(),
            'avg_per_month'          => $this->getAvgPerMonth(),
            'posts_by_weeks'         => $this->getPostsByWeeks(),
            'longest_per_month'      => $this->getLongestPerMonth()    
        ];        
    }
}