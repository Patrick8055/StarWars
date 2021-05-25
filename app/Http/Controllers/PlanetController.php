<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetController extends Controller
{
  public function index()
  {
    try {
      $planets = $this->getAll('planets');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }

    return view('list_pages/planets', compact('planets'));
  }

  public function show($id)
  {
    try {
      $planet = $this->getOne('planets', $id);
      $planetResidents = $this->getAssociated($planet, 'residents');
      $planetFilms = $this->getAssociated($planet, 'films');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }
    
    return view('detail_pages/planet', compact('planet', 'planetResidents', 'planetFilms'));
  }
}
