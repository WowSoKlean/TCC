<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Lab;
use App\Enums\LabType; // Importe o Enum

class EngenhariaSocialController extends Controller
{
    public function index()
    {
        return view('labs.engenharia-social.index');
    }

    public function complete(Request $request)
    {
        // BUSCA SEGURA COM ENUM
        // Se mudarmos a string 'engenharia-social' no futuro, 
        // só alteramos no arquivo do Enum, e tudo continua funcionando.
        $lab = Lab::where('slug', LabType::EngenhariaSocial)->firstOrFail();

        // Salva o progresso na pivot table
        $request->user()->labs()->syncWithoutDetaching([$lab->id]);

        return response()->noContent();
    }
}