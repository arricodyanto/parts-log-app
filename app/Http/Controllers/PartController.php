<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        //        $parts = Part::with('vehicle')->paginate(15);
        $vehicles = Vehicle::with('parts')->paginate(15);

        return view('parts.view', compact('vehicles'));
    }

    public function add()
    {
        $vehicles = Vehicle::all(['id', 'name']);
        return view('parts.add', compact('vehicles'));
    }

    public function store(Request $req)
    {
        // validasi form
        $req->validate([
            'vehicle_id' => 'required',
            'parts.*.hours_meter' => 'required|numeric',
            'parts.*.qty' => 'required|numeric',
            'parts.*.repl' => 'required|numeric',
            'parts.*.price' => 'required|numeric',
        ]);

        // simpan parts
        foreach ($req->parts as $part) {
            Part::create([
                'vehicle_id' => $req->vehicle_id,
                'hours_meter' => $part['hours_meter'],
                'desc' => $part['desc'],
                'part_desc' => $part['part_desc'],
                'qty' => $part['qty'],
                'unit' => $part['unit'],
                'repl' => $part['repl'],
                'price' => $part['price'],
            ]);
        }
        return redirect()->route('parts.view')->with('success', 'Parts has been added successfully');
    }
}

?>
