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

    public function getAll($resourceName, $categoryIds)
    {
      $results = [];
      $ids = Cache::get($categoryIds);
      foreach($ids as $id){
        $results[$id] = Cache::get('http://swapi.dev/api/' . $resourceName .'/' . $id . '/');
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
