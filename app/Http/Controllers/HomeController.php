<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Vehicle;
use App\Models\VehicleSpecification;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        $selectedVehicle = Vehicle::findOrFail(request('vehicle_id', $vehicles->last()->id));

        $hours_meter = Part::all()->pluck('hours_meter')->unique()->sort();

        $vehicleSpecifications = $selectedVehicle->vehicleSpecifications;
        $parts = $selectedVehicle->parts;

        // Calculate $sortedParts
        $selectedHM = request('picked_hm', 250); // default value 250 if not provided
        $sortedParts = $parts
            ->sortBy('hours_meter')
            ->filter(function ($part) use ($selectedHM) {
                return $part->hours_meter <= $selectedHM;
            })
            ->values();

        // parts chart
        $pieChart = (new LarapexChart)->pieChart()
            ->setTitle('Parts Price (Pie)')
            ->setSubtitle('HM '.$selectedHM)
            ->setDataset($sortedParts->pluck('price')->toArray())
            ->setLabels($sortedParts->pluck('part_desc')->toArray());
        
        $barChart = (new LarapexChart)->barChart()
            ->setTitle('Parts Price (Pie)')
            ->setSubtitle('HM '.$selectedHM)
            ->setHeight(350)
            ->setXAxis($sortedParts->pluck('part_desc')->toArray())
            ->setDataset([
                [
                    'name'  =>  'Quantity',
                    'data'  =>  $sortedParts->pluck('qty')->map(fn ($value) => (int)$value)->toArray()
                ],
                [
                    'name'  =>  'Price ($)',
                    'data'  =>  $sortedParts->pluck('price')->toArray()
                ],
            ]);
        
        return view('home', compact('vehicles', 'selectedVehicle', 'sortedParts', 'hours_meter', 'pieChart', 'barChart'));
    }

}
