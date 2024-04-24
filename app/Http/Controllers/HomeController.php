<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Vehicle;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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
            ->setTitle('Parts Price ($)')
            ->setSubtitle('HM '.$selectedHM)
            ->setDataset($sortedParts->pluck('price')->toArray())
            ->setLabels($sortedParts->pluck('part_desc')->toArray());

        $barChart = (new LarapexChart)->barChart()
            ->setTitle('Parts Total Price ($)')
            ->setSubtitle('HM '.$selectedHM)
            ->setHeight(350)
            ->setXAxis($sortedParts->pluck('group_desc')->toArray())
            ->setDataset([
                [
                    'name' => '($) Total Price',
                    'data' => $sortedParts->map(function ($item) {
                        return $item->qty * $item->price;
                    })->toArray(),
                ],
            ]);

        return view('home', compact('vehicles', 'selectedVehicle', 'sortedParts', 'hours_meter', 'pieChart', 'barChart'));
    }
}
