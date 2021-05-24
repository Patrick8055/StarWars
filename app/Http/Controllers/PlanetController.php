<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlanetController extends Controller
{
  public function index()
  {
    $planet_ids = Cache::get('planet_ids');
    $planets =[];
    foreach($planet_ids as $id){
      $planets[$id] = Cache::get('http://swapi.dev/api/planets/' . $id . '/');
    }

    return view('list_pages/planets', compact('planets'));
  }

  public function show($id)
  {

    $planet = Cache::get('http://swapi.dev/api/planets/' . $id .'/');
    // dd(str_replace('http://swapi.dev/api', '', $planet['url']));

    $characters = [];
    $films = [];

    //refactor duplicate code using functions
    // validate and check for missing data, add exceptions and errors with try catch
    foreach($planet['residents'] as $character){
      array_push($characters, Cache::get($character));
    }

    foreach($planet['films'] as $film){
      array_push($films, Cache::get($film));
    }

    // dd($planet, $characters, $films);

    return view('detail_pages/planet', compact('planet', 'characters', 'films'));
  }
}
