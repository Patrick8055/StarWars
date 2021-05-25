<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PeopleController extends Controller
{
  public function index()
  {
    try {
      $people = $this->getAll('people');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }
    return view('list_pages/people', compact('people'));
  }

  public function show($id)
  {
    try {
      $character = $this->getOne('people', $id);
      $characterHomeworld = Cache::get($character['homeworld']);
      $characterFilms = $this->getAssociated($character, 'films');
      $characterSpecies = $this->getAssociated($character, 'species');
      $characterStarships = $this->getAssociated($character, 'starships');
      $characterVehicles = $this->getAssociated($character, 'vehicles');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }
    return view('detail_pages/character', compact('character', 'characterHomeworld', 'characterFilms', 'characterSpecies', 'characterStarships', 'characterVehicles'));
  }
}
