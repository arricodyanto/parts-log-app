<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Vehicle;
use App\Models\VehicleSpecification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        $selectedVehicle = Vehicle::findOrFail(request('vehicle_id', $vehicles->last()->id));

        $vehicleSpecifications = $selectedVehicle->vehicleSpecifications;
        $parts = $selectedVehicle->parts;

        return view('home', compact('vehicles', 'selectedVehicle', 'vehicleSpecifications', 'parts'));
    }

}
