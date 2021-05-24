<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PeopleController extends Controller
{
  public function index()
  {
    $people = $this->getAll('people', 'peopleIds');;

    return view('list_pages/people', compact('people'));
  }

  public function show($id)
  {
    $character = Cache::get('http://swapi.dev/api/people/' . $id .'/');
    $homeworld = Cache::get($character['homeworld']);
    $films = $this->getAssociated($character, 'films');
    $species = $this->getAssociated($character, 'species');
    $starships = $this->getAssociated($character, 'starships');
    $vehicles = $this->getAssociated($character, 'vehicles');

    return view('detail_pages/character', compact('character', 'homeworld', 'films', 'species', 'starships', 'vehicles'));
  }
}
