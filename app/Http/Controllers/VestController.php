<?php

namespace App\Http\Controllers;

use App\Models\Kontakt;
use App\Models\Vest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class VestController extends Controller
{
    //sve novosti
    public static function Svi(){
        return view('stranice.index', ['Novosti' => Vest::latest()->get()]);
    }

    //5 poslednjih novosti
    public static function Index(){
        return view('stranice.index', ['Novosti' =>Vest::latest()->take(5)->get()]);
    }
    //Nadji jedan
    public static function Nadji($id){
        return view('stranice.novost', [
            'novost'=> Vest::find($id)
        ]);
    }
    //Forma za novu vest
    public static function NovaForma(){
        return view('stranice.create');
    }
    //Potvrda stvaranje nove vesti
    public static function Nova(Request $r)
    {
        $formFields = $r->validate([
            'Naslov' => 'required',
            'Opis' => 'required'
        ]);

        $novost = new Vest();

        $novost ->create($formFields);

        return redirect('/');
    }

    //Izbrisi jedan
    public static function Izbrisi($id){
        $novost = Vest::find($id);
        $novost->delete();
        return redirect('/');
    }
    //Forma za promenu novosti
    public static function Promena($id){
        return view('stranice.edit', ['novost'=>Vest::find($id)]);
    }
    //Potvrda izmene
    public static function Izmena(Request $r,$id){
        $novost = Vest::find($id);
        
        $novost->Naslov=$r->Naslov;
        $novost->Opis=$r->Opis;

        $novost->save();

        return redirect('/vesti');
    }

    

}
