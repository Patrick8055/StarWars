<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SpeciesController extends Controller
{
  public function index()
  {
    $species_ids = Cache::get('species_ids');
    $species =[];
    foreach($species_ids as $id){
      $species[$id] = Cache::get('http://swapi.dev/api/species/' . $id . '/');
    }

    return view('list_pages/species', compact('species'));
  }

  public function show($id)
  {

    $one_species = Cache::get('http://swapi.dev/api/species/' . $id .'/');

    $homeworld = Cache::get($one_species['homeworld']);
    $characters = [];
    $films = [];

    //refactor duplicate code using functions
    // validate and check for missing data, add exceptions and errors with try catch
    foreach($one_species['people'] as $character){
      array_push($characters, Cache::get($character));
    }

    foreach($one_species['films'] as $film){
      array_push($films, Cache::get($film));
    }


    // dd($one_species, $homeworld, $characters, $films);

    return view('detail_pages/one_species', compact('one_species', 'homeworld', 'characters', 'films'));
  }
}
