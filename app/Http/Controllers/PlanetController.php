<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlanetController extends Controller
{
  public function index()
  {
    $planets = $this->get_all('planets', 'planet_ids');

    return view('list_pages/planets', compact('planets'));
  }

  public function show($id)
  {
    $planet = Cache::get('http://swapi.dev/api/planets/' . $id .'/');
    $residents = $this->get_associated($planet, 'residents');
    $films = $this->get_associated($planet, 'films');

    return view('detail_pages/planet', compact('planet', 'residents', 'films'));
  }
}
