<!doctype html>
<html lang="en">
  <head>
    <title>{{auth()->user()->Ime." ".auth()->user()->Prezime}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\profil-stranica.css">
    <link rel="icon" href="/images/learning.png" type="image/png">
 
    </head>
  <body>
    <div class="header">
      <div class="header1">
         <div class="logo"> 
          <img src="/images/learning.png" alt="LOGO">
          </div>
          <div class="naslov">
            <i><h1><a href="\">PsihoGuru</a></h1></i>
            </div>   
          </div>
          <div class="header2">
          @auth
          <div class="header2-1">
          <div class="izlogujse">
            <span><b><a href="#">Dobrodosli,{{auth()->user()->Ime}}</a></b></span>
            <form action="/logout" method="POST">
              @csrf
              @method('POST')
              <button><img src="\images\logout.png" alt="logout"></button>
            </form>
          </div>
        </div>
          @else
          <div class="header2-1">
          <div class="RegistracijaSlika">
          <a href="/registracija">
              <img src="\images\registracija.png" alt="registracija">
            </a>
          </div>
          <div class="LoginSlika">
          <a href="/login">
              <img src="\images\login.png" alt="login">
            </a>
          </div>
        </div>
          @endauth
          <div class="header2-2">
          <div class="navigacija">
            <ul>
              <i><li><a href="\vesti">Sve novosti</a></li></i> 
              <i><li><a href="\kursevi">Svi kursevi</a></li></i> 
              <i><li><a href="\kontakti">Kontakti</a></li></i> 
              @auth
              @if(auth()->user()->TipP=='Administrator')
              <i><li><a href="\obavestenja">Profili</a></li></i> 
              @endif
              @endauth
            </ul>  
          </div>
          </div>
        </div>
        </div>
  </a>
    <div class="main">
        <div class="main-levi">
            @auth
            <div>
            <a href="/promenas"><button>Promeni sifru</button></a>
            </div>
            @endauth
        </div>
        <div class="main-srednji">
           <div class="Profil"> 
                <div class="Slika">
                    <img src="\storage\Slike\{{auth()->user()->Slika}}"  alt="{{auth()->user()->Slika}}"/>
                </div>
                <div class="Podaci">
                    <div class="Ime">
                        <p>{{auth()->user()->Ime}} {{auth()->user()->Prezime}}({{auth()->user()->Pol}})</p>
                    </div>
                    <div class="Drzava">
                        <p>{{auth()->user()->DrzavaR}}</p>
                    </div>
                    <div class="JMBG">
                        <p>JMBG: {{auth()->user()->JMBG}}</p>
                    </div>
                    <div class="DR">
                      <p>Datum rodjenja: {{$DatumR}}</p>
                  </div>
                    <div class="BrT">
                        <p>Broj telefona: {{auth()->user()->BrojT}}</p>
                    </div>
                    <div class="EA">
                        <p>E-adresa: {{auth()->user()->Eadresa}}</p>
                    </div>
                    <div class="TP">
                        <p>Tip profila: {{auth()->user()->TipP}}</p>
                    </div>
                    <div class="PO">
                        <p>Prosecna ocena: {{$ProsecnaOcena}}</p>
                    </div>
                    <div class="PR">
                        <p>Prosecna tacnost: {{$ProsecnaTacnost}}</p>
                    </div>
                </div>
           </div>
           <div class="MojiP">
            @if($mojaPolaganja!=null && $mojaPolaganja>0)
                <div class="Tekst">
                    <h4>Vasi pokusaji</h5>
                </div>
                <div class="TabelaMP">
                   <table class="T1">
                    <tr>
                        <th>Ime kursa</th>
                        <th>Ime profesora</th>
                        <th>Datum polaganja</th>
                        <th>Tacnost</th>
                        <th>Ocena</th>
                    </tr>
                    @foreach($mojaPolaganja as $m)
                    <tr>
                        <td>{{$m['Ime_kursa']}}</td>
                        <td>{{$m['Ime_Profesora']}}</td>
                        <td>{{$m['Datum_Polaganja']}}</td>
                        <td>{{$m['Rezultat']}}</td>
                        <td>{{$m['Ocena']}}</td>
                    </tr>
                    @endforeach
                   </table>
                </div>
                @else
                <div>
                  <h4>Niste polagali kurseve</h4>
                </div>
                @endif
           </div>
           @if(auth()->user()->TipP=="Predavac" || auth()->user()->TipP=="Administrator")
           <div class="MojiK">
            @if($mojiKursevi!=null && count($mojiKursevi)>0)
            <div class="Tekst">
                <h4>Vasi kursevi</h5>
            </div>
            <div class="TabelaMK">
               <table class="T">
                <tr>
                    <th>Ime kursa</th>
                    <th>Broj polaganja</th>
                    <th>Prosecna ocena</th>
                    <th>Prosecna tacnost</th>
                </tr>
                @foreach ($mojiKursevi as $mk) 
                @if($mk['Prosecna_Ocena']<6 || $mk['Prosecan_Rezultat']<60)
                <tr style="color:Red">
                    <th>{{$mk['Ime_Kursa']}}</th>
                    <th>{{$mk['brojPolaganja']}}</th>
                    <th>{{$mk['Prosecna_Ocena']}}</th>
                    <th>{{$mk['Prosecan_Rezultat']}}</th>
                </tr>
                @else
                <tr>
                  <th>{{$mk['Ime_Kursa']}}</th>
                  <th>{{$mk['brojPolaganja']}}</th>
                  <th>{{$mk['Prosecna_Ocena']}}</th>
                  <th>{{$mk['Prosecan_Rezultat']}}</th>
                </tr>
                @endif
                @endforeach
               </table>
            </div>
            @else
            <div>
              <h4>Nema vasih kurseva</h4>
            </div>
            @endif
          </div>
          <div class="PolaganjaPoStudentu">
            @if($PosebnaPolaganja!=null && count($PosebnaPolaganja)>0)
            <div>
              <div>
                <h3>Posebna polaganja</h3>
              </div>
              <div>
                <table class="TabelaPP">
                  <tr>
                    <th>Student</th>
                    <th>Kurs</th>
                    <th>Datum polaganja</th>
                    <th>Rezultat</th>
                    <th>Ocena</th>
                  </tr>
                  @foreach($PosebnaPolaganja as $p)
                  <tr>
                    <th>{{$p['Student']}}</th>
                    <th>{{$p['Kurs']}}</th>
                    <th>{{$p['DatumPolaganja']}}</th>
                    <th>{{$p['Rezultat']}}</th>
                    <th>{{$p['Ocena']}}</th>
                  </tr>
                  @endforeach
                </table> 
              </div>
            </div>
            @else
            <div>
              <h4>Niko nije pohadjao vase kurseve</h4>
            </div>
            @endif
          </div>
          @endif
    </div>
    <div class="main-desni">
    </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html>