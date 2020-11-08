<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'autoload.php';

final class StatTest extends TestCase
{
    public function testAvgPerMonth(): void
    {
        $res = $this->getStat()->getAvgPerMonth();
        $this->assertEquals($res[11], 5.5);
        $this->assertEquals($res[12], 11);
        $this->assertEquals($res[1],  17);        
    }

    public function testPostsByWeeks(): void
    {        
        $res = $this->getStat()->getPostsByWeeks();        
        $this->assertEquals($res[45], 2);
        $this->assertEquals($res[50], 2);
        $this->assertEquals($res[1],  1);        
    }
    
    private function getStat() {
        $source = new PostsSourceTest();        
        return new Stat($source);        
    }    
}
