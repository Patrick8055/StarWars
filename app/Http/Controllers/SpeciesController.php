<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SpeciesController extends Controller
{
  public function index()
  {
    $species = $this->getAll('species');

    return view('list_pages/species', compact('species'));
  }

  public function show($id)
  {
    $oneSpecies = $this->getOne('species', $id);
    $speciesHomeworld = Cache::get($oneSpecies['homeworld']);
    $speciesPeople = $this->getAssociated($oneSpecies, 'people');
    $speciesFilms = $this->getAssociated($oneSpecies, 'films');

    return view('detail_pages/one-species', compact('oneSpecies', 'speciesHomeworld', 'speciesPeople', 'speciesFilms'));
  }
}
