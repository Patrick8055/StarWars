<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
  public function index()
  {
    $vehicles = $this->getAll('vehicles');

    return view('list_pages/vehicles', compact('vehicles'));
  }

  public function show($id)
  {
    $vehicle = $this->getOne('vehicles', $id);
    $vehicleFilms = $this->getAssociated($vehicle, 'films');
    $vehiclePilots = $this->getAssociated($vehicle, 'pilots');

    return view('detail_pages/vehicle', compact('vehicle', 'vehicleFilms', 'vehiclePilots'));
  }
}
