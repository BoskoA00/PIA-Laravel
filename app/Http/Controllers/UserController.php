<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use App\Models\Polaganje;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as IlluminateValidationRule;
use Nette\Utils\DateTime;
use Psr\Log\NullLogger;
use App\Models\Sifre;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public static function FormaRegistracije(){
        return view('korisnici.registracija');
    }
    public static function StvaranjeKorisnika(Request $r){
        $formFields=$r->validate([
            'Ime'=>['required'],
            'Prezime'=>['required'],
            'password'=>['required','confirmed',IlluminateValidationRule::unique('users','password'),'min:6','regex:/^(?=.*[A-Z])[A-Z](?=.*[a-zA-Z0-9]{4,}).*$/'],
            'Pol'=>['required'],
            'DrzavaR'=>['required'],
            'DatumR'=>['required'],
            'JMBG'=>['required',IlluminateValidationRule::unique('users','JMBG'),'max:13','min:13'],
            'BrojT'=>['required'],
            'Eadresa'=>['required',IlluminateValidationRule::unique('users','Eadresa')],
            'Slika'=>['nullable' ,'image'],
            'TipP'=>['required']
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        
        $putanja=null;
        if($r->hasFile('Slika')){
            $putanja=$r->file('Slika')->storeAs('Slike',$r->file('Slika')->getClientOriginalName(),'public');
            $a=$r->file('Slika')->getClientOriginalName();
        $formFields['Slika']=$a;
        }
        

        $user = User::create($formFields);
        $formFields=[
            "Id_Profila"=>$user->id,
            "Lozinka" => $user->password
        ];
        $sifra=Sifre::create($formFields);
        return redirect('/login')->withInput();

    }

    public static function Izlogujse(Request $r){
        auth()->logout();

        $r->session()->invalidate();
        $r->session()->regenerateToken();

        return redirect('/login');
    }

    public static function Ulogujse(){
        return view('korisnici.login');
    }
    public static function PotvrdaLogovanja(Request $r){
        $formFields = $r->validate([
            'Eadresa' => ['required', 'email'],
            'password' => ['required','regex:/^(?=.*[A-Z])[A-Z](?=.*[a-zA-Z0-9]{4,}).*$/']
         ]);

         if(auth()->attempt($formFields)){
            if(auth()->user()->Odobren=='Da')
            {
           $r->session()->regenerate();

            return redirect('/');
        }
        else
        {
            return back()->withErrors(['Eadresa'=>'Nije odobren profil'])->onlyInput('Eadresa');
        }
           }

         return back()->withErrors(['Eadresa'=>'Neispravni podaci'])->onlyInput('Eadresa');
    }

    public static function PromeniS(){
        return view('korisnici.promenas');
    }

    public static function Promena(Request $r){
        $sablon="/^(?=.*[A-Z])[A-Z](?=.*[a-zA-Z0-9]{4,}).*$/";
        if(!empty(trim($r->password)) || preg_match($sablon,$r->password)){
        $user = User::where('Eadresa', $r->Eadresa)->first();
        $sifra= new Sifre;
        $sifra=Sifre::where('Id_Profila',auth()->user()->id)->take(3)->get();
        $losaSifra=false;
        foreach( $sifra as $s ){
            if(Hash::check($r->password,$s["Lozinka"])){
                $losaSifra=true;
            }
        }

        if($losaSifra)
        {
            return back()->withErrors(['Lozinka1'=>'Mora da bude drugacija od prethodne 3']);

        }
        else{
            $lozinka=bcrypt($r->password);
            $user["password"]=$lozinka;
            $user->update();
        }
        return back();
    }
    else{
       
        return back()->withErrors(['Lozinka'=>'Neispravni podaci']);
    }
    }
    public static function Profil($id){
        $polaganja=Polaganje::where('Id_Polaznika',$id)->get();
        $mojaPolaganja=null;
        $mojaProsecnaOcena=0;
        $mojProsecniRezutlat=0;
        $datumRodjenja=new DateTime(auth()->user()->DatumR);
        $datumRodjenja=$datumRodjenja->format('d-m-Y');
        $i=0;
        if(count($polaganja)>0 && $polaganja!=null){
            foreach ($polaganja as $p ) {                
                $kurs=Kurs::where('id',$p->Id_Kursa)->first();
                $datum=new DateTime($p->Datum_Polaganja);
                if($kurs!=null){
                    $mojaPolaganja[$i]=[ 'Ime_kursa' => $kurs->ImeKursa ,
                    'Ime_Profesora'=>$kurs->ImeProfesora,
                    'Datum_Polaganja'=>$datum->format('d-m-Y'),
                    'Rezultat'=>number_format($p->Rezultat,2),
                    'Ocena'=>number_format($p->Ocena,2)           
                ];
                $mojaProsecnaOcena+=$p->Ocena;
                $mojProsecniRezutlat+=$p->Rezultat;
                $i++;
             }
                
        }
    }

    if($i!=0){
        $mojaProsecnaOcena=$mojaProsecnaOcena/$i;
        $mojProsecniRezutlat=$mojProsecniRezutlat/$i;
    }
    else
    {
        $mojaProsecnaOcena=0;
        $mojProsecniRezutlat=0;         
    }   
    $mojiKursevi=null;
    $i=0;
    $mojiK=Kurs::where('Id_Profesora',$id)->get();
    
        foreach ($mojiK as $mk ){
            $prosecnaOcena=0;
            $prosecanRezultat=0;
            $brojPolaganja=0;
            $polaganja=Polaganje::where('Id_Kursa',$mk->id)->get();
            foreach ($polaganja as $p) {
                $brojPolaganja++;
                $prosecanRezultat+=$p->Rezultat;
                $prosecnaOcena+=$p->Ocena;
            }   
            if($brojPolaganja!=0) $mojiKursevi[$i]=['Ime_Kursa'=>$mk->ImeKursa,'brojPolaganja'=>$brojPolaganja,'Prosecan_Rezultat'=>number_format(($prosecanRezultat/$brojPolaganja),2),'Prosecna_Ocena'=>number_format(($prosecnaOcena/$brojPolaganja),2)];          
            else $mojiKursevi[$i]=['Ime_Kursa'=>$mk->ImeKursa,'brojPolaganja'=>$brojPolaganja,'Prosecan_Rezultat'=>0,'Prosecna_Ocena'=>0];
            $i++;
        }
    
        $posebnaPolaganja=null;
        $i=0;
        foreach ($mojiK as $m) {
            $polaganja=Polaganje::where("Id_Kursa",$m->id)->get();
            foreach ($polaganja as $p) {
                $korisnik=User::where('id',$p->Id_Polaznika)->first();
                $datum=new DateTime( $p->Datum_Polaganja);
                if($korisnik!=null){

                    $posebnaPolaganja[$i]=[
                        'Student' => $korisnik->Ime . " " . $korisnik->Prezime,
                        'Kurs' =>   $m->ImeKursa ,
                        'DatumPolaganja' => $datum->format('d-m-Y'),
                        'Ocena' => number_format( $p -> Ocena,2),
                        'Rezultat' =>number_format( $p-> Rezultat,2)        
                    ];
                    $i++;
                }
            }
        }
        if($mojaPolaganja!=null){$mojaPolaganja=array_reverse($mojaPolaganja);}
        if($mojiKursevi!=null){$mojiKursevi=array_reverse( $mojiKursevi);}
        if($posebnaPolaganja!=null){$posebnaPolaganja=array_reverse( $posebnaPolaganja);}
        return view('korisnici.profil',['mojaPolaganja'=>$mojaPolaganja,'mojiKursevi' =>$mojiKursevi, 'ProsecnaOcena' =>number_format( $mojaProsecnaOcena,2),
            'ProsecnaTacnost' =>number_format( $mojProsecniRezutlat,2), 'PosebnaPolaganja' =>$posebnaPolaganja,'DatumR'=>$datumRodjenja]);
      
    }
}