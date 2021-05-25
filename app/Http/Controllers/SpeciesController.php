<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SpeciesController extends Controller
{
  public function index()
  {
    try {
      $species = $this->getAll('species');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }

    return view('list_pages/species', compact('species'));
  }

  public function show($id)
  {
    try {
      $oneSpecies = $this->getOne('species', $id);
      $speciesHomeworld = Cache::get($oneSpecies['homeworld']);
      $speciesPeople = $this->getAssociated($oneSpecies, 'people');
      $speciesFilms = $this->getAssociated($oneSpecies, 'films');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }
    
    return view('detail_pages/one-species', compact('oneSpecies', 'speciesHomeworld', 'speciesPeople', 'speciesFilms'));
  }
}
