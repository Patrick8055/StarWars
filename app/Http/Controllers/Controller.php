<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Routing\Controller as BaseController;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
    * Return information for one specific film, character, planet, species, vehicle or starship.
    *
    * @return array
    */
    public function getOne(String $category, String $id)
    {

      if (!Cache::get('http://swapi.dev/api/' . $category . '/' . $id .'/')) {
        throw new Exception('Resource not found in cache.');
      }
      return Cache::get('http://swapi.dev/api/' . $category . '/' . $id .'/');
    }

    /**
    * Return all films, people, planets, species, vehicles or starships.
    *
    * @return array
    */
    public function getAll(String $category)
    {
      if (!Cache::get($category . 'Ids')) {
        throw new Exception('Resource not found in cache.');
      }

      $results = [];
      $ids = Cache::get($category . 'Ids');
      foreach($ids as $id){
        if (!Cache::get('http://swapi.dev/api/' . $category .'/' . $id . '/')) {
          throw new Exception('Resource not found in cache.');
        }
        $results[$id] = Cache::get('http://swapi.dev/api/' . $category .'/' . $id . '/');
      }

      return $results;
    }

    /**
    * Return the with the resource associated films, characters, planets, speciess, vehicles or starships.
    *
    * @return array
    */
    public function getAssociated(Array $resource, String $category)
    {
      $results = [];
      foreach($resource[$category] as $res){
        if (!Cache::get($res)) {
          throw new Exception('Resource not found in cache.');
        }
        array_push($results, Cache::get($res));
      }

      return $results;
    }
}
