<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StarshipController extends Controller
{
  public function index()
  {
    $starships = $this->getAll('starships', 'starshipsIds');

    return view('list_pages/starships', compact('starships'));
  }

  public function show($id)
  {
    $starship = Cache::get('http://swapi.dev/api/starships/' . $id .'/');
    $films = $this->getAssociated($starship, 'films');
    $pilots = $this->getAssociated($starship, 'pilots');

    return view('detail_pages/starship', compact('starship', 'films', 'pilots'));
  }
}
