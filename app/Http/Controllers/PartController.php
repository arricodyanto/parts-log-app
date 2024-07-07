<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

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
                'group_desc' => $part['group_desc'],
                'part_no' => $part['part_no'],
                'part_desc' => $part['part_desc'],
                'qty' => $part['qty'],
                'unit' => $part['unit'],
                'repl' => $part['repl'],
                'price' => $part['price'],
            ]);
        }
        return redirect()->route('parts.view')->with('success', 'Parts has been added successfully');
    }

    public function storeExcel(Request $req) {
        // validasi form
        $req->validate([
            'vehicle_id' => 'required',
            'parts_log' => 'required|file|mimes:xls,xlsx'
        ]);

        $file = $req->file('parts_log');

        // read file
        $data = Excel::toCollection(new Collection(), $file)->first();

        $dataArray = [];
        foreach ($data as $row) {
            $dataArray[] = $row->toArray();
        }

        // delete header
        array_shift($dataArray);

        // format ulang menjadi array yang sesuai
        $parts = [];
        foreach ($dataArray as $part) {
            $parts[] = [
                'vehicle_id' => $req->vehicle_id,
                'hours_meter' => $part[0],
                'desc' => $part[1],
                'group_desc' => $part[2],
                'part_no' => $part[3],
                'part_desc' => $part[4],
                'qty' => $part[5],
                'repl' => $part[6],
                'unit' => $part[7],
                'price' => number_format($part[8], 2, '.', ''),
            ];
        }

        // simpan ke db
        foreach ($parts as $partData) {
            Part::create($partData);
        }

        return redirect()->route('parts.view')->with('success', 'Parts has been added successfully');
    }

    public function delete(Vehicle $vehicle) {
        Part::where('vehicle_id', $vehicle->id)->delete();

        return redirect()->route('parts.view')->with('success', 'All parts data from the selected vehicle have been deleted');
    }
}
?>
