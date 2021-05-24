<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehicleController extends Controller
{
  public function index()
  {
    $vehicles = $this->getAll('vehicles', 'vehiclesIds');

    return view('list_pages/vehicles', compact('vehicles'));
  }

  public function show($id)
  {
    $vehicle = Cache::get('http://swapi.dev/api/vehicles/' . $id .'/');
    $films = $this->getAssociated($vehicle, 'films');
    $pilots = $this->getAssociated($vehicle, 'pilots');

    return view('detail_pages/vehicle', compact('vehicle', 'films', 'pilots'));
  }
}
