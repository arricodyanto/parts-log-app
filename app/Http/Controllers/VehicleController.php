<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleSpecification;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index() {
        $vehicles = Vehicle::paginate(1);
        // $vehicleId = Vehicle::find();

        return view('vehicles.view', compact('vehicles'));
    }

    public function edit(Vehicle $vehicle) {
        $specifications = VehicleSpecification::where('vehicle_id', $vehicle->id)->get();
        return view('vehicles.edit', compact('vehicle', 'specifications'));
    }
}
