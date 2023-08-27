<!doctype html>
<html lang="en">
  <head>
    <title>{{$k->ImeP. " ".$k->PrezimeP}} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\kontakt-stranica.css">
    <link rel="icon" href="/images/learning.png" type="image/png">
 
    </head>
  <body>
    <div class="header">
      <div class="header1">
         <div class="logo"> 
          <img src="/images/learning.png" alt="LOGO">
          </div>
          <div class="naslov">
            <i><h1><a href="\">Pocetna stranica</a></h1></i>
            </div>   
          </div>
          <div class="header2">
          @auth
          <div class="header2-1">
          <div class="izlogujse">
            <span><b><a href="/profil/{{auth()->user()->id}}">Dobrodosli,{{auth()->user()->Ime}}</a></b></span>
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
    <div class="main">
        <div class="main-levi">
         @auth
          <div>
            <a href="\promenas"><button>Promeni sifru</button></a>
          </div>
          @endauth
        </div>
        <div class="main-srednji">
           <div class="Kontakt">
              <div class="SlikaK">
                <img src="\storage\Slike\{{$k->Slika}}"  alt="{{$k->Slika}}"/>
              </div>
              <div class="Podaci">
                <div>
                  <p>Ime i prezime: {{$k->ImeP. " " .$k->PrezimeP}}</p>
                </div>
                <div>
                  <p>Broj telefona: {{$k->BrojT}}</p>
                </div>
                <div>
                  <p>E-adresa: {{$k->Eadresa}}</p>
                </div>
              </div>
           </div>
          <div class="Dugmad">
        @auth
            @if(auth()->user()->TipP=='Administrator')
            <div> 
            <form action="\kontakti\{{$k->id}}\brisanje" method="POST">
            @csrf
            @method('DELETE')
                <button class="izbrisi">Izbrisi kontakt</button>
          </a>
          </form>
        </div>
        <div>
          <a href="\kontakti\{{$k->id}}}\edit" >
            <button class="Izmeni">Izmeni kontakt</button>
         </a>
        </div>
            @endif
        @endauth
      </div>
      </div>  
      <div class="main-desni">
      </div>
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html>