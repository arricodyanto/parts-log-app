<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Vehicle;

class PartController extends Controller
{
    public function index()
    {
        //        $parts = Part::with('vehicle')->paginate(15);
        $vehicles = Vehicle::with('parts')->paginate(15);

        return view('parts.view', compact('vehicles'));
    }
}
