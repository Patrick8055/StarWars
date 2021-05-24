<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SpeciesController extends Controller
{
  public function index()
  {
    $species = $this->get_all('species', 'species_ids');

    return view('list_pages/species', compact('species'));
  }

  public function show($id)
  {
    $one_species = Cache::get('http://swapi.dev/api/species/' . $id .'/');
    $homeworld = Cache::get($one_species['homeworld']);
    $characters = $this->get_associated($one_species, 'people');
    $films = $this->get_associated($one_species, 'films');

    return view('detail_pages/one-species', compact('one_species', 'homeworld', 'characters', 'films'));
  }
}
