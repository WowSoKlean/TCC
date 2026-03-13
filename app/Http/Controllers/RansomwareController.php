<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use App\Enums\LabType;

class RansomwareController extends Controller
{
    public function index()
    {
        return view('labs.ransomware.index');
    }

    public function complete(Request $request)
    {
        $lab = Lab::where('slug', LabType::Ransomware)->firstOrFail();
        
        $request->user()->labs()->syncWithoutDetaching([$lab->id]);

        return response()->noContent();
    }
}