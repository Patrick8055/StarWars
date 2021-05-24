<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlanetController extends Controller
{
  public function index()
  {
    $planets = $this->getAll('planets', 'planetsIds');

    return view('list_pages/planets', compact('planets'));
  }

  public function show($id)
  {
    $planet = Cache::get('http://swapi.dev/api/planets/' . $id .'/');
    $residents = $this->getAssociated($planet, 'residents');
    $films = $this->getAssociated($planet, 'films');

    return view('detail_pages/planet', compact('planet', 'residents', 'films'));
  }
}
