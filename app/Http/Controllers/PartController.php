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
        return null;
    }
}

?>
