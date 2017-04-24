<?php

namespace App\Helpers;

use Illuminate\Support\ServiceProvider;

use App\Helpers\Contracts\ISerializer;


class Serializer  implements  ISerializer
{
    public $result = '';
    
    public function serializeItem($item, $key){
      $t = gettype($item)[0];
      $l = $t == 's' ? strlen($item) : sizeOf($item); 
      $kt = gettype($key)[0];
      $kl = strlen((string)$key);   
      $s = ''; 
      if($t == 'a'){
        $s =  $kt.':'.(  $kt!='i' ? $kl.':':'' ). ($kt=='s'  ? '"' : '') . (string)$key.';'. $t.':'.$l.':{';
        $this->result .= $s;
        array_walk($item, 'self::serializeItem');
        $this->result .= '}';
      }
      else
      {
      
        $s = $kt.':'.(  $kt!='i' ? $kl.':':'' ). ($kt=='s'  ? '"' : '') . (string)$key. ($kt=='s'  ? '"' : '').';' .  $t.':'.(  $t!='i' ? $l.':':'' ). ($t=='s'  ? '"' : '') . (string)$item. ($t=='s'  ? '"' : '').';';  
        $this->result .= $s;     
      }
      
    }
  
    public function doSerialize(array $data){
      $this->result = '';
      array_walk($data, 'self::serializeItem');  
      $t = gettype($data)[0];
      $l = sizeOf($data);
      $serialized = $t.':'.$l.':{';
      $serialized .= $this->result;     
      $serialized .= '}';
      return $serialized;
    }
    
    public function doUnserialize($serializedData ){
      //TODO: Make custom function for unserialize
      return unserialize($serializedData);
    }
}
