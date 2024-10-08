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
//        $vehicleSpecifications = $selectedVehicle->vehicleSpecifications;
//        $parts = $selectedVehicle->parts;

        // Get paginated parts directly from the database
        $selectedHM = request('picked_hm', 250);
        $sortedPartsQuery = $selectedVehicle->parts()
            ->where('hours_meter', '<=', $selectedHM)
            ->orderBy('hours_meter');

        // calculate total expenses
        $parts = $sortedPartsQuery->get();
        $totalExpenses = 0;
        foreach ($parts as $part) {
            $totalPrice = $part->qty * $part->price;
            $totalExpenses += $totalPrice;
        }

        // Paginate the parts query
        $sortedParts = $sortedPartsQuery->paginate(10)->onEachSide(1);

        // Add row number to each part in paginated results
        $currentPage = $sortedParts->currentPage();
        $perPage = $sortedParts->perPage();
        $sortedParts->getCollection()->transform(function ($part, $key) use ($currentPage, $perPage) {
            $part->rownumber = ($currentPage - 1) * $perPage + $key + 1;
            return $part;
        });

        // Tambahkan parameter ke URL paginasi
        $sortedParts->appends([
            'picked_hm' => request('picked_hm'),
            'vehicle_id' => request('vehicle_id')
        ]);

        // Pie Chart Data
        $pieChartData = [
            'labels' => $parts->pluck('part_desc')->toArray(),
            'data' => $parts->pluck('price')->toArray(),
        ];

        // Bar Chart Data
        $barChartData = [
            'labels' => $parts->pluck('group_desc')->toArray(),
            'data' => $parts->map(function ($item) {
                return $item->qty * $item->price;
            })->toArray(),
        ];

        return view('home', compact('vehicles', 'selectedVehicle', 'sortedParts', 'hours_meter', 'selectedHM', 'totalExpenses', 'pieChartData', 'barChartData'));
    }
}
