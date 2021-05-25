<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetController extends Controller
{
  public function index()
  {
    $planets = $this->getAll('planets');

    return view('list_pages/planets', compact('planets'));
  }

  public function show($id)
  {
    $planet = $this->getOne('planets', $id);
    $planetResidents = $this->getAssociated($planet, 'residents');
    $planetFilms = $this->getAssociated($planet, 'films');

    return view('detail_pages/planet', compact('planet', 'planetResidents', 'planetFilms'));
  }
}
