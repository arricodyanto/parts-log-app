<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Part;

class HomeController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        $selectedVehicle = Vehicle::findOrFail(request('vehicle_id', $vehicles->last()->id));

        $hours_meter = Part::all()->pluck('hours_meter')->unique()->sort();
        $vehicleSpecifications = $selectedVehicle->vehicleSpecifications;
        $parts = $selectedVehicle->parts;

        $selectedHM = request('picked_hm', 250);
        $sortedParts = $parts
            ->sortBy('hours_meter')
            ->filter(function ($part) use ($selectedHM) {
                return $part->hours_meter <= $selectedHM;
            })
            ->values();

        // Pie Chart Data
        $pieChartData = [
            'labels' => $sortedParts->pluck('part_desc')->toArray(),
            'data' => $sortedParts->pluck('price')->toArray(),
        ];

        // Bar Chart Data
        $barChartData = [
            'labels' => $sortedParts->pluck('group_desc')->toArray(),
            'data' => $sortedParts->map(function ($item) {
                return $item->qty * $item->price;
            })->toArray(),
        ];

        return view('home', compact('vehicles', 'selectedVehicle', 'sortedParts', 'hours_meter', 'selectedHM', 'pieChartData', 'barChartData'));
    }
}
