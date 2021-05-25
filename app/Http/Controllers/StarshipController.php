<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarshipController extends Controller
{
  public function index()
  {
    $starships = $this->getAll('starships');

    return view('list_pages/starships', compact('starships'));
  }

  public function show($id)
  {
    $starship = $this->getOne('starships', $id);
    $starshipFilms = $this->getAssociated($starship, 'films');
    $starshipPilots = $this->getAssociated($starship, 'pilots');

    return view('detail_pages/starship', compact('starship', 'starshipFilms', 'starshipPilots'));
  }
}
