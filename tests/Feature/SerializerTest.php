<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Helpers\Contracts\ISerializer;
use App\Helpers\Serializer;

class SerializerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testSerialize()
    {
      $serializer = new Serializer();
      $tc1 = ['a','zzzzzz', 3, ['aaaa'=>4,5,6,[7]]];
      $tc2 =  ['aaaa'=>4,'bbb'=>5,'ccc'=>6];
      
      $tc3 = 'a:4:{i:0;s:1:"a";i:1;s:6:"zzzzzz";i:2;i:3;i:3;a:4:{s:4:"aaaa";i:4;i:0;i:5;i:1;i:6;i:2;a:1:{i:0;i:7;}}}';
      
      $this->assertEquals($serializer->doSerialize($tc1), serialize($tc1));      
      $this->assertEquals($serializer->doSerialize($tc2), serialize($tc2));
      
      $this->assertEquals($serializer->doUnserialize($tc3), unserialize($tc3));
    }
}
