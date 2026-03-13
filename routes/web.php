<?php

use App\Http\Controllers\EngenhariaSocialController;
use App\Http\Controllers\PhishingController;
use App\Http\Controllers\MalwareController;
use App\Http\Controllers\RansomwareController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Enums\LabType;

// Homepage Route
Route::get('/', function () {
    return view('homepage');
})->name('home');

// Lab Routes
// Corrected the view path to 'labs.<view-name>'
// and organized the names with a 'labs.' prefix.

Route::middleware(['auth', 'verified'])->group(function () {
    
    // --- LAB 1: ENGENHARIA SOCIAL ---
    Route::get('/labs/engenharia-social', [EngenhariaSocialController::class, 'index'])
        ->name('labs.engenharia-social');
    Route::post('/labs/engenharia-social/complete', [EngenhariaSocialController::class, 'complete'])
        ->name('labs.engenharia-social.complete');
    
    // --- LAB 2: PHISHING ---
    Route::get('/labs/phishing', [PhishingController::class, 'index'])
        ->name('labs.phishing');
    Route::post('/labs/phishing/complete', [PhishingController::class, 'complete'])
        ->name('labs.phishing.complete');

    // --- LAB 3: MALWARE (ATUALIZADO) ---
    Route::get('/labs/malware', [MalwareController::class, 'index'])
        ->name('labs.malware');

    // Nova Rota POST:
    Route::post('/labs/malware/complete', [MalwareController::class, 'complete'])
        ->name('labs.malware.complete');

    // --- LAB 4: RANSOMWARE ---
    Route::get('/labs/ransomware', [RansomwareController::class, 'index'])
        ->name('labs.ransomware');

    Route::post('/labs/ransomware/complete', [RansomwareController::class, 'complete'])
        ->name('labs.ransomware.complete');
});

// Other Routes
Route::get('/sobre-nos', function () {
    return view('sobre_nos');
})->name('sobre-nos'); 

Route::get('/login', function () {
    // This will likely be handled by the auth.php routes,
    // but leaving it in case you have a custom page.
})->name('login');

Route::get('/dashboard', function () {
    $user = Auth::user();
    $user->load('labs');

    // Verifica se completou (retorna true/false)
    $hasDone = fn($type) => $user->labs->contains('slug', $type);

    $status = [
        'engenharia_social' => $hasDone(LabType::EngenhariaSocial),
        'phishing'          => $hasDone(LabType::Phishing),
        'malware'           => $hasDone(LabType::Malware),
        'ransomware'        => $hasDone(LabType::Ransomware),
    ];

    // Calcula a porcentagem total (Soma dos Trues / 4 * 100)
    // count(array_filter($status)) conta quantos são 'true'
    $totalCompleted = count(array_filter($status));
    $globalProgress = ($totalCompleted / 4) * 100;

    return view('dashboard', compact('status', 'globalProgress'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



