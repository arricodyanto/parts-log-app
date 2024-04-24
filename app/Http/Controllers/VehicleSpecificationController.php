<?php

namespace App\Http\Controllers;

use App\Models\VehicleSpecification;

class VehicleSpecificationController extends Controller
{
    public function findById($vehicle_id)
    {
        $vehicleSpecifications = VehicleSpecification::find($vehicle_id);

        return view('home', [
            'vehicleSpecifications' => $vehicleSpecifications,
        ]);
    }
}
