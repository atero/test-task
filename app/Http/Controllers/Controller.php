<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Helpers\Contracts\ISerializer;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    function index(ISerializer $serializer){
      $data = ['aaaa'=>4,'bbb'=>5,'ccc'=>6];
      return '<pre>' . $serializer->doSerialize($data) . '<br>' . serialize($data);
      
    }
    
}
