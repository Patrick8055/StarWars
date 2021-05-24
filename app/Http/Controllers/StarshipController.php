<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StarshipController extends Controller
{
  public function index()
  {
    $starships = $this->get_all('starships', 'starship_ids');

    return view('list_pages/starships', compact('starships'));
  }

  public function show($id)
  {
    $starship = Cache::get('http://swapi.dev/api/starships/' . $id .'/');
    $films = $this->get_associated($starship, 'films');
    $pilots = $this->get_associated($starship, 'pilots');

    return view('detail_pages/starship', compact('starship', 'films', 'pilots'));
  }
}
