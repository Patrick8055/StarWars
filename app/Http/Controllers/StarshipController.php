<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


use Illuminate\Support\Facades\Http;

class StarshipController extends Controller
{
  public function index()
  {
    $starship_ids = Cache::get('starship_ids');
    $starships =[];
    foreach($starship_ids as $id){
      $starships[$id] = Cache::get('http://swapi.dev/api/starships/' . $id . '/');
    }

    return view('list_pages/starships', compact('starships'));
  }

  public function show($id)
  {

    $starship = Cache::get('http://swapi.dev/api/starships/' . $id .'/');

    $films = [];
    $pilots = [];

    //refactor duplicate code using functions
    // validate and check for missing data, add exceptions and errors with try catch
    foreach($starship['pilots'] as $pilot){
      array_push($pilots, Cache::get($pilot));
    }

    foreach($starship['films'] as $film){
      array_push($films, Cache::get($film));
    }

    // dd($starship, $characters, $species, $planets, $starships, $vehicles);

    return view('detail_pages/starship', compact('starship', 'films', 'pilots'));
  }
}
