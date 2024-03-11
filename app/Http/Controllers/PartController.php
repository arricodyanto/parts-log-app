<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $parts = Part::with('vehicle')->paginate(15);

        return view('parts.view', compact('parts'));
    }
}
