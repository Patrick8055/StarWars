<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public function index()
    {
      $film_ids = Cache::get('film_ids');
      $films =[];
      
      foreach($film_ids as $id){
        $films[$id] = Cache::get('http://swapi.dev/api/films/' . $id . '/');
      }

      return view('list_pages/films', compact('films'));
    }

    public function show($id)
    {

      $film = Cache::get('http://swapi.dev/api/films/' . $id .'/');

      $characters = [];
      $species = [];
      $planets = [];
      $starships = [];
      $vehicles = [];

      //refactor duplicate code using functions
      // validate and check for missing data, add exceptions and errors with try catch

      foreach($film['characters'] as $character){
        array_push($characters, Cache::get($character));
      }

      foreach($film['species'] as $s){
        array_push($species, Cache::get($s));
      }

      foreach($film['planets'] as $planet){
        array_push($planets, Cache::get($planet));
      }

      foreach($film['starships'] as $starship){
        array_push($starships, Cache::get($starship));
      }

      foreach($film['vehicles'] as $vehicle){
        array_push($vehicles, Cache::get($vehicle));
      }

      // dd($film, $characters, $species, $planets, $starships, $vehicles);

      return view('detail_pages/film', compact('film', 'characters', 'species', 'planets', 'starships', 'vehicles'));
    }
}
