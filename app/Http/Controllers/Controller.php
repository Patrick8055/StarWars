<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // how should I name the functions and variables here??
    // TODO: validate and check for missing data, add exceptions and errors with try catch

    public function get_all($resource_name, $id_name)
    {
      $array = [];
      $ids = Cache::get($id_name);
      foreach($ids as $id){
        $array[$id] = Cache::get('http://swapi.dev/api/' . $resource_name .'/' . $id . '/');
      }

      return $array;
    }

    public function get_associated($resource, $category)
    {
      $array = [];
      foreach($resource[$category] as $cat){
        array_push($array, Cache::get($cat));
      }

      return $array;
    }
}
