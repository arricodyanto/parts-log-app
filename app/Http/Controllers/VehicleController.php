<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('vehicleSpecifications')->paginate(15);

        return view('vehicles.view', compact('vehicles'));
    }

    public function add()
    {
        return view('vehicles.add');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'vehicle_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk foto kendaraan
            'specifications' => 'required|array|min:1',
            'specifications.*.specs' => 'required|string|max:255',
            'specifications.*.specs_value' => 'required|string|max:255',
        ]);

        // Simpan file image ke server
        $imageFile = $request->file('vehicle_photo');
        $imageFile->move('images', $imageFile->getClientOriginalName());

        // Simpan data kendaraan
        $vehicle = Vehicle::create([
            'name' => $request->name,
            'vehicle_photo' => $imageFile->getClientOriginalName(), // Simpan path foto kendaraan ke dalam database
        ]);

        // Simpan spesifikasi kendaraan
        foreach ($request->specifications as $specification) {
            VehicleSpecification::create([
                'vehicle_id' => $vehicle->id,
                'specs' => $specification['specs'],
                'specs_value' => $specification['specs_value'],
            ]);
        }

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('vehicles.view')->with('success', 'New vehicle has been added successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        $specifications = VehicleSpecification::where('vehicle_id', $vehicle->id)->get();

        return view('vehicles.edit', compact('vehicle', 'specifications'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
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

        // update vehicle photo
        if ($request->vehicle_photo != null) {
            $imagePath = public_path('images/'.$vehicle->vehicle_photo);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // save new vehicle_photo
            $imageFile = $request->file('vehicle_photo');
            $vehicle->vehicle_photo = $imageFile->getClientOriginalName();
            $imageFile->move('images', $imageFile->getClientOriginalName());
        }

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

    public function delete(Vehicle $vehicle)
    {
        // Delete the vehicle_photo if the exists
        $imagePath = public_path('images/'.$vehicle->vehicle_photo);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $vehicle->vehicleSpecifications()->delete();
        $vehicle->delete();

        return redirect()->route('vehicles.view');
    }
}
