<?php 
namespace App\Helpers\Contracts;

interface ISerializer {
    public function doSerialize(array  $data);
    public function doUnserialize($serializedData);
}