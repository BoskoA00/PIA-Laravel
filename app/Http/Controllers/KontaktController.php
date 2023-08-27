<?php

namespace App\Http\Controllers;

use App\Models\Kontakt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontaktController extends Controller
{
    public static function Kontakti(){
        return view('kontakti.kontakti', [
            'kontakti' => Kontakt::all()
        ]);
    }
    public static function Forma(){
        return view('kontakti.unoskontakta');
    }
    public static function DodajK(Request $r){
        
        $formFields = $r->validate([
            'ImeP'=>['required'],
            'PrezimeP'=>['required'],
            'BrojT'=>['required','regex:/^(\+3816[01234569]|06[01234569])\d{6,7}$/'],
            'Eadresa'=>['required','email'],
            'Slika'=>['nullable' , 'image']
        ]);
        $kontakt = new Kontakt();
        $kontakt->ImeP = $r->ImeP;
        $kontakt->PrezimeP = $r->PrezimeP;
        $kontakt->BrojT = $r->BrojT;
        $kontakt->Eadresa = $r->Eadresa;
        
        $putanja=null;
        if($r->hasFile('Slika')){
            $putanja=$r->file('Slika')->storeAs('Slike',$r->file('Slika')->getClientOriginalName(),'public');
            $a=$r->file('Slika')->getClientOriginalName();
            $formFields['Slika']=$a;
        }
        
        $kontakt->create($formFields); 
        
        return redirect('/kontakti');
    }
    public static function JedanK($id){
        return view('kontakti.kontakt', ['k' => Kontakt::find($id)]);
    }
    public static function PromenaK($id){
        return view('kontakti.kontaktedit', ['k'=>Kontakt::find($id)]);
    }
    //Potvrda izmene
    public static function IzmenaK(Request $r,$id){
        $formFields=$r->validate([
            'ImeP' => 'required',
            'PrezimeP' => 'required',
            'BrojT' =>  ['required','regex:/^(\+3816[01234569]|06[01234569])\d{6,7}$/'],
            'Eadresa'=> ['required','email']
        ]);
        
        $k = Kontakt::find($id);
        
        $k->ImeP=$r->ImeP;
        $k->PrezimeP=$r->PrezimeP;
        $k->BrojT=$r->BrojT;
        $k->Eadresa=$r->Eadresa;

        $k->save();

        return redirect('/kontakti');
    }
    public static function BrisanjeK($id){
        $k = Kontakt::find($id);
        $k->delete();
        return redirect('/kontakti');
    }
}
