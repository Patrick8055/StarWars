<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FilmController extends Controller
{
    public function index()
    {
      $films = $this->get_all('films', 'film_ids');

      return view('list_pages/films', compact('films'));
    }

    public function show($id)
    {
      $film = Cache::get('http://swapi.dev/api/films/' . $id .'/');
      $characters = $this->get_associated($film, 'characters');
      $species = $this->get_associated($film, 'species');
      $planets = $this->get_associated($film, 'planets');
      $starships = $this->get_associated($film, 'starships');
      $vehicles = $this->get_associated($film, 'vehicles');

      return view('detail_pages/film', compact('film', 'characters', 'species', 'planets', 'starships', 'vehicles'));
    }
}
