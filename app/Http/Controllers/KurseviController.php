<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use App\Models\Pitanje;
use App\Models\Polaganje;
use App\Models\Vest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\DateTime;

class KurseviController extends Controller
{
    //Pokazna stranica
    public static function Index(){
        return view('kursevi.kursevi', ['kursevi'=> Kurs::all()]);
    }
    public static function Nadji($id){
        return view('kursevi.kurs',['kurs'=>Kurs::find($id),'Pitanja'=>Pitanje::where('Id_Kursa',$id)->get()]);
    }
    public static function DodavanjeKursa(){
        return view('kursevi.create');
    }
    public static function DodajKurs(Request $r){
            $formFields=$r->validate([
                'ImeProfesora'=>'required',
                'ImeKursa'=>'required',
                'OpisKursa'=>'required',
                'PrilozeniMaterijal',
                'Id_Profesora'    
            ]);  
            $putanja=null;
            if($r->hasFile('PrilozeniMaterijal')){
                $putanja=$r->file('PrilozeniMaterijal')->storeAs('Materijal',$r->file('PrilozeniMaterijal')->getClientOriginalName(),'public');
                $a=$r->file('PrilozeniMaterijal')->getClientOriginalName();
                $formFields['PrilozeniMaterijal']=$a;
            }
            $formFields['Id_Profesora']=auth()->user()->id;
            $kurs=new Kurs();
            $kurs->create($formFields);
            Vest::create([
                'Naslov'=>"Novi kurs",
                'Opis'=> auth()->user()->Ime . " " . auth()->user()->Prezime . " je dodao novi kurs - " . $r->ImeKursa
            ]);
               return redirect('/kursevi');
         }
    public static function IzbrisiKurs($id){
        $kurs=Kurs::find($id);
        $kurs->delete();

        return redirect('/kursevi');
    }
    public static function Editovanje($id){
        return view('kursevi.edit-kurs',['kurs'=>Kurs::find($id)]);
    }
    public static function Izmeni(Request $r,$id){
        $kurs=Kurs::find($id);

        $kurs->ImeProfesora=$r->ImeProfesora;
        $kurs->OpisKursa=$r->OpisKursa;
        $kurs->ImeKursa=$r->ImeKursa;

        $kurs->save();

        return redirect('/kursevi');
    }
    public static function Skidanje($id){
        $kurs=Kurs::find($id);
        $putanja = "public\Materijal". "\\" . $kurs->PrilozeniMaterijal;
        if (Storage::exists($putanja)) {
            return Storage::download($putanja, $kurs->PrilozeniMaterijal);
        }
        abort(404, 'Fajl nije pronađen.');
    }
    public static function DodavanjePitanja($id){
        return  view('kursevi.dodavanje-pitanja',['kurs'=>Kurs::find($id)]);
    }
    public static function UnosPitanja(Request $r,$id){
            
        for($i=0;$i<count($r->txtPitanja);$i++){
            $formFields = $r->validate([
                'txtPitanja.' . $i => 'required',
                'Odgovor.' . ($i * 4) => 'required',
                'Odgovor.' . ($i * 4 + 1) => 'required',
                'Odgovor.' . ($i * 4 + 2) => 'required',
                'Odgovor.' . ($i * 4 + 3) => 'required',
                'Index.' . $i => 'required',
                'Tezina.' . $i => 'required'
            ]);
    
            $pitanje = Pitanje::create([
                'Pitanje' => $formFields['txtPitanja'][$i],
                'Odgovor1' => $formFields['Odgovor'][$i * 4],
                'Odgovor2' => $formFields['Odgovor'][$i * 4 + 1],
                'Odgovor3' => $formFields['Odgovor'][$i * 4 + 2],
                'Odgovor4' => $formFields['Odgovor'][$i * 4 + 3],
                'TacanOdgovor' => $formFields['Index'][$i],
                'Id_Kursa' => $id,
                'Tezina' => $formFields['Tezina'][$i]
            ]);
        }

        return redirect('/kursevi');
    }    

    public static function Polaganje($id){
        return view('kursevi.polaganje',['kurs'=>Kurs::find($id),'pitanja'=>Pitanje::where('Id_Kursa',$id)->get()]);
    }
    public static function Kraj(Request $r,$id){
        $rezultat=0;
        $ukupanBrPoena=0;
        $ocena=5;
        $id_Polaznika=auth()->user()->id;
        $id_Kursa=$id;
        for($i=0;$i<count($r->idPitanja);$i++){
            $pitanje=Pitanje::find($r->idPitanja[$i]);
            $ukupanBrPoena+=$pitanje->Tezina;
            if($r->Odgovor!=null){
             if($r->Odgovor[$pitanje->id]==$pitanje->TacanOdgovor ){
                if($r->Pomoc[$pitanje->id]==1)
                {
                    $rezultat+=($pitanje->Tezina*0.5);
                }
                else
                {
                    $rezultat+=$pitanje->Tezina;
                }
            }
        }
            else{
                $rezultat+=0;
            }
        }
        $rezultat=($rezultat/$ukupanBrPoena)*100;
        if($rezultat<=50){
            $ocena=5;
        }
        else if($rezultat>=51 && $rezultat<=60){
            $ocena=6;
        }
        else if($rezultat>=61 && $rezultat<=70){
            $ocena=7;
        }
        else if($rezultat>=71 && $rezultat<=80){
            $ocena=8;
        }
        else if($rezultat>=81 && $rezultat<=90){
            $ocena=9;
        }
        else if($rezultat>=91 && $rezultat<=100){
            $ocena=10;
        }
        $polaganje=new Polaganje();
        $datum=new DateTime('now');
        Polaganje::create([
            'Id_Polaznika'=>$id_Polaznika,
            'Id_Kursa'=>$id_Kursa,
            'Rezultat'=>$rezultat,
            'Datum_Polaganja'=>$datum,
            'Ocena'=>$ocena
        ]);

        return redirect('/kursevi');
    }
}
  
