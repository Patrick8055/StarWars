<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarshipController extends Controller
{
  public function index()
  {
    try {
      $starships = $this->getAll('starships');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }

    return view('list_pages/starships', compact('starships'));
  }

  public function show($id)
  {
    try {
      $starship = $this->getOne('starships', $id);
      $starshipFilms = $this->getAssociated($starship, 'films');
      $starshipPilots = $this->getAssociated($starship, 'pilots');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }
    
    return view('detail_pages/starship', compact('starship', 'starshipFilms', 'starshipPilots'));
  }
}
