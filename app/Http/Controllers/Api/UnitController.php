<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function unitList()
    {
        $unit = DB::table('units')->select('name','status')->latest()->get();
        return response()->json($unit);
    }

    public function store(Request $request){
        // $data = array();
        // $data['name'] = $request->name;
        // $unit = DB::table('units')->insert($data);
        // return response()->json($unit);

        $unit = new Unit();
        $unit->name = ucfirst($request->name);
        $unit->save();
        return response()->json($unit);
    }
}
