<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SpeciesController extends Controller
{
  public function index()
  {
    $species = $this->getAll('species', 'speciesIds');

    return view('list_pages/species', compact('species'));
  }

  public function show($id)
  {
    $oneSpecies = Cache::get('http://swapi.dev/api/species/' . $id .'/');
    $homeworld = Cache::get($oneSpecies['homeworld']);
    $characters = $this->getAssociated($oneSpecies, 'people');
    $films = $this->getAssociated($oneSpecies, 'films');

    return view('detail_pages/one-species', compact('oneSpecies', 'homeworld', 'characters', 'films'));
  }
}
