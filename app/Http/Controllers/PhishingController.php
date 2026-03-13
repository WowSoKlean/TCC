<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use App\Enums\LabType; // Importante: O Enum que criamos

class PhishingController extends Controller
{
    public function index()
    {
        return view('labs.phishing.index');
    }

    public function complete(Request $request)
    {
        // 1. Busca o Lab usando o Enum (evita erros de digitação)
        $lab = Lab::where('slug', LabType::Phishing)->firstOrFail();

        // 2. Salva o progresso na tabela pivô (sem duplicar)
        $request->user()->labs()->syncWithoutDetaching([$lab->id]);

        // 3. Retorna 204 (Sucesso, sem corpo), ideal para o fetch do JS
        return response()->noContent();
    }
}