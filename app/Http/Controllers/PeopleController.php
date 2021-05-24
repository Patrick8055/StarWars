<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Http;

class PeopleController extends Controller
{
  public function index()
  {
    $character_ids = Cache::get('character_ids');
    $people =[];
    foreach($character_ids as $id){
      $people[$id] = Cache::get('http://swapi.dev/api/people/' . $id . '/');
    }

    return view('list_pages/people', compact('people'));
  }

  public function show($id)
  {

    $character = Cache::get('http://swapi.dev/api/people/' . $id .'/');

    $homeworld = Cache::get($character['homeworld']);

    $films = [];
    $species = [];
    $starships = [];
    $vehicles = [];

    //refactor duplicate code using functions
    // validate and check for missing data, add exceptions and errors with try catch
    // dd($character);
    foreach($character['films'] as $film){
      array_push($films, Cache::get($film));
    }

    foreach($character['species'] as $s){
      array_push($species, Cache::get($s));
    }

    foreach($character['starships'] as $starship){
      array_push($starships, Cache::get($starship));
    }

    foreach($character['vehicles'] as $vehicle){
      array_push($vehicles, Cache::get($vehicle));
    }

    // dd($character, $film, $species, $homeworld, $starships, $vehicles);

    return view('detail_pages/character', compact('character', 'films', 'species', 'homeworld', 'starships', 'vehicles'));
  }
}
