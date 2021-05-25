<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
      $films = $this->getAll('films');

      return view('list_pages/films', compact('films'));
    }

    public function show($id)
    {
      $film = $this->getOne('films', $id);
      $filmCharacters = $this->getAssociated($film, 'characters');
      $filmSpecies = $this->getAssociated($film, 'species');
      $filmPlanets = $this->getAssociated($film, 'planets');
      $filmStarships = $this->getAssociated($film, 'starships');
      $filmVehicles = $this->getAssociated($film, 'vehicles');

      return view('detail_pages/film', compact('film', 'filmCharacters', 'filmSpecies', 'filmPlanets', 'filmStarships', 'filmVehicles'));
    }
}
