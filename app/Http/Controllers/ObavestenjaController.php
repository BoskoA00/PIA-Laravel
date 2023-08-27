<?php

namespace App\Http\Controllers;

use App\Models\Sifre;
use App\Models\User;
use Illuminate\Http\Request;

class ObavestenjaController extends Controller{
    public static function Index(){
        return view('stranice.obavestenja',[
            'obavestenja'=>User::all()
        ]);
    }
    public static function OdobriK($id){
        $korisnik = User::find($id);
        $korisnik['Odobren'] = 'Da';

        $korisnik->save();

        return back();
    }
    public static function OdbijK($id){
        $korisnik = User::find($id);
        $sifre=Sifre::where("Id_Profila",$id)->get();
         $korisnik->delete();
        foreach ($sifre as $s ) {
            $s->delete();
        }

        return back();
    }
    public static function IzbrisiK($id){
        $korisnik = User::find($id);
        $sifre=Sifre::where("Id_Profila",$id)->get();
        $korisnik->delete();
        foreach ($sifre as $s) {
            $s->delete();
        }
    }
}
