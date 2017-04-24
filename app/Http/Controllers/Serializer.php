<?php

namespace App\Http\Controllers\ISerializer;

interface ISerializer {
    public function doSerialize(array $data);
    public function doUnseialize($serializedData);
}

class Serializer implements  ISerializer
{
    public function doSerialize(array $data){
      
    }
    
    public function doUnseialize($serializedData ){
      
    }
}