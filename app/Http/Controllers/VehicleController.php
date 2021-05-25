<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
  public function index()
  {
    try {
      $vehicles = $this->getAll('vehicles');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }

    return view('list_pages/vehicles', compact('vehicles'));
  }

  public function show($id)
  {
    try {
      $vehicle = $this->getOne('vehicles', $id);
      $vehicleFilms = $this->getAssociated($vehicle, 'films');
      $vehiclePilots = $this->getAssociated($vehicle, 'pilots');
    } catch (Exception $e) {
      echo $e->getMessage(), "\n";
    }
    
    return view('detail_pages/vehicle', compact('vehicle', 'vehicleFilms', 'vehiclePilots'));
  }
}
