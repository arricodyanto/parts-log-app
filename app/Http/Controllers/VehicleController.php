<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index() {
        $vehicles = Vehicle::paginate(1);
        // $vehicleId = Vehicle::find();

        return view('vehicles.view', compact('vehicles'));
    }
}
