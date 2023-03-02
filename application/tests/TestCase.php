<?php

class TestCase extends PHPUnit_Framework_TestCase 
{
    public function testing(){
        $this->assertStringContainsString('foo', 'bar');
    }
}
