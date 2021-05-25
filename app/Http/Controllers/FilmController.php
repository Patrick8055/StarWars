<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
      try {
        $films = $this->getAll('films');
      } catch (Exception $e) {
        echo $e->getMessage(), "\n";
      }

      return view('list_pages/films', compact('films'));
    }

    public function show(String $id)
    {
      try {
        $film = $this->getOne('films', $id);
        $filmCharacters = $this->getAssociated($film, 'characters');
        $filmSpecies = $this->getAssociated($film, 'species');
        $filmPlanets = $this->getAssociated($film, 'planets');
        $filmStarships = $this->getAssociated($film, 'starships');
        $filmVehicles = $this->getAssociated($film, 'vehicles');
      } catch (Exception $e) {
        echo $e->getMessage(), "\n";
      }

      return view('detail_pages/film', compact('film', 'filmCharacters', 'filmSpecies', 'filmPlanets', 'filmStarships', 'filmVehicles'));
    }
}
