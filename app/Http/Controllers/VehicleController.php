<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function index() {
        $vehicles = Vehicle::with('vehicleSpecifications')->paginate(15);
        // dd($vehicles);
        // $vehicleId = Vehicle::find();

        return view('vehicles.view', compact('vehicles'));
    }

    public function edit(Vehicle $vehicle) {
        $specifications = VehicleSpecification::where('vehicle_id', $vehicle->id)->get();
        return view('vehicles.edit', compact('vehicle', 'specifications'));
    }

    public function update(Request $request, Vehicle $vehicle) {
        // Validasi form dan update data utama
        $request->validate([
            'name' => 'required|string',
            'specifications' => 'array',
            'specifications.*.id' => 'nullable|uuid', // Sesuaikan dengan jenis ID yang digunakan
            'specifications.*.specs' => 'required|string',
            'specifications.*.specs_value' => 'required|string',
        ]);
    
        // vehicle update handller
        $vehicle->name = $request->name;
        $vehicle->save();
    
        // specs delete handler
        $receivedSpecIds = collect($request->specifications)->pluck('id')->filter(); // Filter ID yang tidak null
        $existingSpecIds = $vehicle->vehicleSpecifications->pluck('id');
    
        $deletedSpecIds = $existingSpecIds->diff($receivedSpecIds);
    
        VehicleSpecification::whereIn('id', $deletedSpecIds)->delete();
    
        // specs update handler
        foreach ($request->specifications as $specData) {
            VehicleSpecification::updateOrCreate(
                ['id' => $specData['id']], // ID yang null akan men-trigger insert baru
                [
                    'vehicle_id' => $vehicle->id,
                    'specs' => $specData['specs'],
                    'specs_value' => $specData['specs_value'],
                ]
            );
        }
    
        return redirect()->route('vehicles.edit', $vehicle->id)->with('success', 'Data updated successfully');
    }

    public function delete(Vehicle $vehicle) {
        $vehicle->vehicleSpecifications()->delete();
        $vehicle->delete();

        return redirect()->route('vehicles.view');
    }
}
