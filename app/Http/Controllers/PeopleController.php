<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PeopleController extends Controller
{
  public function index()
  {
    $people = $this->get_all('people', 'character_ids');;

    return view('list_pages/people', compact('people'));
  }

  public function show($id)
  {
    $character = Cache::get('http://swapi.dev/api/people/' . $id .'/');
    $homeworld = Cache::get($character['homeworld']);
    $films = $this->get_associated($character, 'films');
    $species = $this->get_associated($character, 'species');
    $starships = $this->get_associated($character, 'starships');
    $vehicles = $this->get_associated($character, 'vehicles');

    return view('detail_pages/character', compact('character', 'homeworld', 'films', 'species', 'starships', 'vehicles'));
  }
}
