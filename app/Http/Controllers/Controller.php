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

    // TODO: validate and check for missing data, add exceptions and errors with try catch
    // type hinting for the methods?

    public function getOne($category, $id)
    {
      return Cache::get('http://swapi.dev/api/' . $category . '/' . $id .'/');
    }

    public function getAll($category)
    {
      $results = [];
      $ids = Cache::get($category . 'Ids');
      foreach($ids as $id){
        $results[$id] = Cache::get('http://swapi.dev/api/' . $category .'/' . $id . '/');
      }

      return $results;
    }

    public function getAssociated($resource, $category)
    {
      $results = [];
      foreach($resource[$category] as $cat){
        array_push($results, Cache::get($cat));
      }

      return $results;
    }
}
