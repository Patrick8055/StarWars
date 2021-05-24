<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehicleController extends Controller
{
  public function index()
  {
    $vehicle_ids = Cache::get('vehicle_ids');
    $vehicles =[];
    foreach($vehicle_ids as $id){
      $vehicles[$id] = Cache::get('http://swapi.dev/api/vehicles/' . $id . '/');
    }

    return view('list_pages/vehicles', compact('vehicles'));
  }

  public function show($id)
  {

    $vehicle = Cache::get('http://swapi.dev/api/vehicles/' . $id .'/');

    $films = [];
    $pilots = [];

    //refactor duplicate code using functions
    // validate and check for missing data, add exceptions and errors with try catch
    foreach($vehicle['pilots'] as $pilot){
      array_push($pilots, Cache::get($pilot));
    }

    foreach($vehicle['films'] as $film){
      array_push($films, Cache::get($film));
    }

    // dd($vehicle, $films, $pilots);

    return view('detail_pages/vehicle', compact('vehicle', 'films', 'pilots'));
  }
}
