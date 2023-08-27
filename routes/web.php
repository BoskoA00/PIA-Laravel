<?php

use App\Http\Controllers\KontaktController;
use App\Http\Controllers\KurseviController;
use App\Http\Controllers\ObavestenjaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VestController;
use App\Models\Kontakt;
use Illuminate\Support\Facades\Route;
use App\Models\Vest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Poslednjih 5
Route::get('/', [VestController::class,'Index']);

//Sve novosti
Route::get('/vesti', [VestController::class, 'Svi']);

//Forma za novu vest
Route::get('/vesti/create', [VestController::class, 'NovaForma'])->middleware('auth');

//Nova vest
Route::post('/vesti/creating', [VestController::class, 'Nova'])->middleware('auth');

//Jedna vest
Route::get('/vesti/{id}', [VestController::class,'Nadji']);

//Izbrisi  vest
Route::delete('/vesti/{id}', [VestController::class, 'Izbrisi'])->middleware('auth');

//Forma za izmenu  novosti
Route::get('/vesti/{id}/edit', [VestController::class, 'Promena'])->middleware('auth');

//Potvrda za promenu novosti
Route::put('/vesti/{id}/editing',[VestController::class,'Izmena'])->middleware('auth');

//Otvaranje forme za registraciju 
Route::get('/registracija' , [UserController::class, 'FormaRegistracije']);

//Stvaranje korisnika
Route::post('/stvaranje' , [UserController::class, 'StvaranjeKorisnika']);

//Odjavljivanje
Route::post('/logout', [UserController::class, 'Izlogujse'])->middleware('auth');

//Forma za prijavljivanje
Route::get('/login', [UserController::class, 'Ulogujse']);

//Logovanje
Route::post('/logging', [UserController::class, 'PotvrdaLogovanja']);

//Kontakti
Route::get('/kontakti', [KontaktController::class, 'Kontakti']);

//Forma za dodavanje kontakta
Route::get('/formakontakta', [KontaktController::class, 'Forma'])->middleware('auth');

//Dodavanje kontakta
Route::post('/dodajk', [KontaktController::class, 'DodajK'])->middleware('auth');

//Jedan kontakt
Route::get('/kontakti/{id}', [KontaktController::class, 'JedanK']);

//Izmeni kontakt
Route::get('/kontakti/{id}/edit', [KontaktController::class, 'PromenaK'])->middleware('auth');

//Potvrda izmene
Route::put('/kontakti/{id}/editing', [KontaktController::class, 'IzmenaK'])->middleware('auth');

//Brisanje kontakta
Route::delete('/kontakti/{id}/brisanje', [KontaktController::class, 'BrisanjeK'])->middleware('auth');

//Obavestenja
Route::get('/obavestenja', [ObavestenjaController::class, 'Index']);

//Odobri korisnika
Route::get('/obavestenja/{id}/da', [ObavestenjaController::class, 'OdobriK'])->middleware('auth');

//Odbij korisnika
Route::get('/obavestenja/{id}/ne', [ObavestenjaController::class, 'OdbijK'])->middleware('auth');

//Izbrisi korisnika
Route::get('/obavestenja/{id}/izbrisi', [ObavestenjaController::class,'IzbrisiK'])->middleware('auth');

//Forma za promenu sifre
Route::get('/promenas', [UserController::class, 'PromeniS'])->middleware('auth');

//Promena sifre
Route::post('/promena', [UserController::class, 'Promena'])->middleware('auth');

//Stranica sa kursevima
Route::get('/kursevi',[KurseviController::class, 'Index']);

//Stranica sa kursem
Route::get('/kursevi/{id}',[KurseviController::class, 'Nadji']);

//Za dodavanje kurseva
Route::get('/dodavanjekursa',[KurseviController::class,'DodavanjeKursa'])->middleware('auth');

//Dodavanje kursa
Route::post('/dodajkurs',[KurseviController::class,'DodajKurs'])->middleware('auth');

//Brisanje kursa
Route::delete('kurs/{id}/izbrisi',[KurseviController::class,'IzbrisiKurs'])->middleware('auth');

//Editovanje kursa
Route::get('/kurs/{id}/edit',[KurseviController::class,'Editovanje'])->middleware('auth');

//Izmena kursa
Route::put('/kurs/{id}/izmena',[KurseviController::class,'Izmeni'])->middleware('auth');

//Skidanje dodatnog materijala
Route::get('/kurs/{id}/materijal',[KurseviController::class,'Skidanje']);

//Forma za stvaranje pitanja

Route::get('/kurs/{id}/dodajP',[KurseviController::class,'DodavanjePitanja'])->middleware('auth');

//Unos pitanja
Route::post('/kurs/{id}/unesiP',[KurseviController::class,'UnosPitanja'])->middleware('auth');

//Polaganje kursa
Route::get('/kurs/{id}/polaganje',[KurseviController::class,'Polaganje'])->middleware('auth');

//Predaja rezultata
Route::post('/kurs/{id}/rezultati',[KurseviController::class,'Kraj'])->middleware('auth');

//Profili korisnika
Route::get('/profil/{id}',[UserController::class,'Profil'])->middleware('auth');

